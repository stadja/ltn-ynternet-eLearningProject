<?php namespace LTN\ElearningCourses\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Conferences extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'ltn.ynternet.elearning.manage_courses' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('LTN.ElearningCourses', 'Ynternet eLearning project', 'conferences');
    }
}