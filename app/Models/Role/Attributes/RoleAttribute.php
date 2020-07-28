<?php


namespace App\Models\Role\Attributes;


trait RoleAttribute
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getEditButtonAttribute('edit-role', 'admin.role.edit').'
                    '.$this->getDeleteButtonAttribute('delete-role', 'admin.role.destroy').'
                </div>';
    }

    public function getDeletedButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getDeletedRoleAttribute('edit-permission', 'admin.permission.edit').'
                </div>';
    }
}
