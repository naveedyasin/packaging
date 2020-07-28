<?php


namespace App\Models\Permission\Attributes;


trait PermissionAttribute
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getEditButtonAttribute('edit-permission', 'admin.permission.edit').'
                    '.$this->getDeleteButtonAttribute('delete-permission', 'admin.permission.destroy').'
                </div>';
    }

    public function getDeletedButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getDeletedPermissionAttribute('edit-permission', 'admin.permission.edit').'
                </div>';
    }
}
