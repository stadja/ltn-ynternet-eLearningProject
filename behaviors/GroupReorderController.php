<?php namespace LTN\ElearningCourses\Behaviors;

use Backend\Behaviors\ReorderController;

class GroupReorderController extends ReorderController
{
    public $groupSort;
    /**
     * Returns all the records from the supplied model.
     * @return Collection
     */
    protected function getRecords()
    {
        $records = null;
        $model = $this->controller->reorderGetModel();
        $query = $model->newQuery();

        $this->controller->reorderExtendQuery($query);

        if ($this->sortMode == 'simple') {
            $query = $query
                ->orderBy($model->getSortOrderColumn());
            $records = $query->get();
            $records = $records->groupBy($model->getGroupColumn());
        }
        elseif ($this->sortMode == 'nested') {
            $records = $query->getNested();
        }

        return $records;
    }

}
