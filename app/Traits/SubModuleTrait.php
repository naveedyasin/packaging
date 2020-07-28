<?php


namespace App\Traits;


use App\Models\Module\Module;

trait SubModuleTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('admin.sub-module.show', 'admin.sub-module.show').'
                    '.$this->getEditButtonAttribute('admin.sub-module.edit', 'admin.sub-module.edit').'
                    '.$this->getDeleteButtonAttribute('admin.sub-module.destroy', 'admin.sub-module.destroy').'
                </div>';
    }

    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'In-active';
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
