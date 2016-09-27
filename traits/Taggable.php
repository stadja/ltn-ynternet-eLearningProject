<?php namespace LTN\ElearningCourses\Traits;
use \LTN\ElearningCourses\Models\Tag;

trait Taggable
{
    public $taggablePivotModel = '';
    public $taggablePivotNamespace = '';
    public $taggablePivotId = '';
    public $pivotTableLabel = '';

    /**
     * Set Tags Attribute
     * @param array(string) $tags array of tag label
     */
    public function setTagsAttribute($tags) {
        $class = $this->taggablePivotModel;
        $ModuleTags = $class::where($this->getPivotTableId(), $this->id)->get();
        foreach($ModuleTags as $ModuleTag) {
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
            $class = $this->taggablePivotModel;
            $ModuleTag = new $class();
            $pivotName = $this->getPivotTableLabel();
            $ModuleTag->$pivotName = $this;
            $ModuleTag->tag = $tag;
            $ModuleTag->save();
        }
    }

    /**
     * Get Tags Attribute
     * @return array(string) $tags array of tag label
     */
    public function getTagsAttribute() {
        $class = $this->getPivotModel();
        $ModuleTags = $class::where($this->getPivotTableId(), $this->id)->get();
        $tags = $ModuleTags->transform(function ($item, $key) {
            return $item->tag->label;
        })->all();

        return $tags;
    }

    /**
     * Get Tag Label Attribute
     * @return array(string) $tags array of tag label
     */
    public function getTagLabelAttribute() {
        $tags = $this->tags;
        if (sizeof($tags) < 1) {
            return '';
        }
        $label = implode(' || ', $tags);
        return $label;
    }


    public function getPivotTableId() {
        if (!$this->taggablePivotId) {
            $pivot = $this->getPivotTableLabel();
            $this->taggablePivotId = $pivot.'_id';
        }
        return $this->taggablePivotId;
    }

    public function getPivotModel() {
        if (!$this->taggablePivotModel) {
            $pivot = $this->getPivotTableLabel();
            $model = ucfirst($pivot).'Tag';
            if ($pivot > 't') {
                $model = 'Tag'.ucfirst($pivot);
            }
            $this->taggablePivotModel = $this->getPivotTableNamespace().'\\'.$model;
        }
        return $this->taggablePivotModel;
    }

    public function getPivotTableLabel() {
        if (!$this->pivotTableLabel) {
            list($namespace, $model) = $this->getPivotTableInfo();
            $this->pivotTableLabel = strtolower($model);
        }
        return $this->pivotTableLabel;
    }

    public function getPivotTableNamespace() {
        if (!$this->taggablePivotNamespace) {
            list($namespace, $model) = $this->getPivotTableInfo();
            $this->taggablePivotNamespace = $namespace;
        }
        return $this->taggablePivotNamespace;
    }

    public function getPivotTableInfo() {
        $matches = array();
        preg_match('/([^\\\]+)$/', get_class($this), $matches);
        $pivotTableLabel = $matches[0];
        $pivotTableNamespace = str_replace('\\'.$matches[0], '', get_class($this));
        return array($pivotTableNamespace, $pivotTableLabel);
    }
}
