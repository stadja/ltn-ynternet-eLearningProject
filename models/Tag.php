<?php namespace LTN\ElearningCourses\Models;

use Model;

/**
 * Model
 */
class Tag extends Model
{
    use \October\Rain\Database\Traits\Validation;

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
    public $table = 'ltn_elearningcourses_tags';

    public $belongsTo = [
        'parentTag' => [
            '\LTN\ElearningCourses\Models\Tag',
            'key'      => 'parent_id',
            'otherKey' => 'id'
        ]
    ];

    public $hasMany = [
        'children' => [
            '\LTN\ElearningCourses\Models\Tag',
            'key'      => 'parent_id',
            'otherKey' => 'id'
        ]
    ];

    public $belongsToMany = [
        'classes' => [
            '\LTN\ElearningCourses\Models\ClassModel',
            'table' => 'ltn_elearningcourses_classe_tag',
            'key'      => 'tag_id',
            'otherKey' => 'class_id'
        ]
    ];

}
