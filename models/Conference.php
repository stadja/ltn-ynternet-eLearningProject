<?php namespace LTN\ElearningCourses\Models;

use Model;

/**
 * Model
 */
class Conference extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \LTN\ElearningCourses\Traits\Taggable;

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
    public $table = 'ltn_elearningcourses_conferences';

}
