<?php namespace LTN\ElearningCourses\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Modules extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','LTN\ElearningCourses\Behaviors\GroupReorderController'];

    public $groupSort = 'course_id';
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'ltn.ynternet.elearning.manage_courses'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('LTN.ElearningCourses', 'Ynternet eLearning project', 'classes');
    }
}
