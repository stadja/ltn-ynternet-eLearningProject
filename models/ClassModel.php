<?php namespace LTN\ElearningCourses\Models;

use Model;
use \LTN\ElearningCourses\Models\ClassTag;
use \LTN\ElearningCourses\Models\Tag;

/**
 * Model
 */
class ClassModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \LTN\ElearningCourses\Traits\Groupable;

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title', 'intro', 'content', 'conclusion'];

    // protected $jsonable = ['tags'];
    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ltn_elearningcourses_classes';

    public $belongsTo = [
        'course' => [
            '\LTN\ElearningCourses\Models\Course',
            'key'      => 'course_id',
            'otherKey' => 'id'
        ]
    ];

    // public $belongsToMany = [
    //     'tags' => [
    //         '\LTN\ElearningCourses\Models\Tag',
    //         'table' => 'ltn_elearningcourses_classe_tag',
    //         'key'      => 'class_id',
    //         'otherKey' => 'tag_id'
    //     ]
    // ];

    const SORT_ORDER = 'position';
    const GROUP_SORT = 'course_id';
    const GROUP_NAME_ID = 'course->title';

    /**
     * Set Tags Attribute
     * @param array(string) $tags array of tag label
     */
    public function setTagsAttribute($tags) {
        $classTags = ClassTag::where('class_id', $this->id)->get();
        foreach($classTags as $classTag) {
            $classTag->delete();
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
            $classTag = new ClassTag();
            $classTag->class = $this;
            $classTag->tag = $tag;
            $classTag->save();
        }
    }

    /**
     * Get Tags Attribute
     * @return array(string) $tags array of tag label
     */
    public function getTagsAttribute() {
        $classTags = ClassTag::where('class_id', $this->id)->get();
        $tags = $classTags->transform(function ($item, $key) {
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


    public function setSortableOrder($itemIds, $itemOrders = null)
    {
        // dd($itemIds, $itemOrders);
        if (!is_array($itemIds))
            $itemIds = [$itemIds];
        if ($itemOrders === null)
            $itemOrders = $itemIds;
        if (count($itemIds) != count($itemOrders)) {
            throw new Exception('Invalid setSortableOrder call - count of itemIds do not match count of itemOrders');
        }
        foreach ($itemIds as $index => $id) {
            $order = $itemOrders[$index];
            $this->newQuery()->where('id', $id)->update([$this->getSortOrderColumn() => $index]);
        }
    }
}
