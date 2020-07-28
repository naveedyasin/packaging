<?php


namespace App\Traits;


use App\Models\Module\SubModule;

trait ModuleTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('admin.module.show', 'admin.module.show').'
                    '.$this->getEditButtonAttribute('admin.module.edit', 'admin.module.edit').'
                    '.$this->getDeleteButtonAttribute('admin.module.destroy', 'admin.module.destroy').'
                </div>';
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'In-active';
    }

    public function sub_modules()
    {
        return $this->hasMany(SubModule::class);
    }
}
