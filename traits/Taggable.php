<?php namespace LTN\ElearningCourses\Traits;
use \LTN\ElearningCourses\Models\Tag;
use \LTN\ElearningCourses\Models\EntityTag;

trait Taggable
{
    public $pivotTableLabel = '';

    /**
     * Set Tags Attribute
     * @param array(string) $tags array of tag label
     */
    public function setTagsAttribute($tags) {
        $entityTags = EntityTag::where(array(
            'entity_type' => $this->getPivotTableLabel(),
            'entity_id'   => $this->id
            ))->get();
        foreach($entityTags as $ModuleTag) {
            $ModuleTag->delete();
        }

        $tagArray = array();
        foreach($tags as $tag) {
            $existingTag = Tag::where('label', 'LIKE', $tag)->get();
            if (sizeof($existingTag) > 0) {
                $existingTag = $existingTag[0];
            } else {
                $existingTag = new Tag();
                $existingTag->label = $tag;
                $existingTag->save();
            }
            $tagArray[] = $existingTag;
        }

        foreach ($tagArray as $tag) {
            $entityTag = new EntityTag();
            $entityTag->entity_type = $this->getPivotTableLabel();
            $entityTag->entity_id = $this->id;
            $entityTag->tag_id = $tag->id;
            $entityTag->save();
        }
    }

    /**
     * Get Tags Attribute
     * @return array(string) $tags array of tag label
     */
    public function getTagsAttribute() {
        $entityTags = EntityTag::where(array(
            'entity_type' => $this->getPivotTableLabel(),
            'entity_id'   => $this->id
            ))->get();
        $tags = $entityTags->transform(function ($item, $key) {
            return $item->tag->label;
        })->all();

        return $tags;
    }

    public function getPivotTableLabel() {
        if (!$this->pivotTableLabel) {
            list($namespace, $model) = $this->getPivotTableInfo();
            $this->pivotTableLabel = strtolower($model);
        }
        return $this->pivotTableLabel;
    }

    public function getPivotTableInfo() {
        $matches = array();
        preg_match('/([^\\\]+)$/', get_class($this), $matches);
        $pivotTableLabel = $matches[0];
        $pivotTableNamespace = str_replace('\\'.$matches[0], '', get_class($this));
        return array($pivotTableNamespace, $pivotTableLabel);
    }
}
