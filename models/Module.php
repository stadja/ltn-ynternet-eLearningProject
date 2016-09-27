<?php namespace LTN\ElearningCourses\Models;

use Model;

/**
 * Model
 */
class Module extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \LTN\ElearningCourses\Traits\Groupable;
    use \LTN\ElearningCourses\Traits\Taggable;

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title', 'intro', 'content', 'conclusion'];

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
    public $table = 'ltn_elearningcourses_modules';

    public $belongsTo = [
        'course' => [
            '\LTN\ElearningCourses\Models\Course',
            'key'      => 'course_id',
            'otherKey' => 'id'
        ]
    ];

    const SORT_ORDER = 'position';
    const GROUP_SORT = 'course_id';
    const GROUP_NAME_ID = 'course->title';

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
