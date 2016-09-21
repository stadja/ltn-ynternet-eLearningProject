<?php namespace LTN\ElearningCourses\Models;

use Model;

/**
 * Model
 */
class ClassTag extends Model
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
    public $table = 'ltn_elearningcourses_classe_tag';

    public $belongsTo = [
        'class' => [
            '\LTN\ElearningCourses\Models\ClassModel',
            'key'      => 'class_id',
            'otherKey' => 'id'
        ],
        'tag' => [
            '\LTN\ElearningCourses\Models\Tag',
            'key'      => 'tag_id',
            'otherKey' => 'id'
        ]
    ];
}