<?php namespace LTN\ElearningCourses\Traits;

trait Groupable
{
    /**
     * Get the name of the "group by" column.
     *
     * @return string
     */
    public function getGroupColumn()
    {
        return defined('static::GROUP_SORT') ? static::GROUP_SORT : 'group_sort';
    }

    public function getGroupNameColumn()
    {
        return defined('static::GROUP_NAME_ID') ? static::GROUP_NAME_ID : 'group_name_id';
    }

    public function getGroupName()
    {
        $groupNameId = $this->getGroupNameColumn();
        $name = $this;
        foreach(explode('->', $groupNameId) as $groupId) {
            $name = $name->$groupId;
        }
        return $name;
    }

}
