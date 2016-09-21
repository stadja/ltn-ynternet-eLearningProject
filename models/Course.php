<?php namespace LTN\ElearningCourses\Models;

use Model;

/**
 * Model
 */
class Course extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title', 'full_description', 'small_description'];

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
    public $table = 'ltn_elearningcourses_courses';

    public $hasMany = [
        'classes' => [
            '\LTN\ElearningCourses\Models\ClassModel',
            'key'      => 'course_id',
            'otherKey' => 'id',
            'order' => 'position asc'
        ],
        'classes_count' => [
            '\LTN\ElearningCourses\Models\ClassModel',
            'key'      => 'course_id',
            'otherKey' => 'id',
            'count' => true
        ]
    ];
}
