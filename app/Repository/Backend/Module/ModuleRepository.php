<?php


namespace App\Repository\Backend\Module;


use App\Models\Module\Module;

class ModuleRepository
{

    public function moduleFillData($module)
    {
        $module->name = request()->name;
        $module->route_name = request()->route;
        $module->position = request()->position;
        $module->icon = request()->icon;
        $module->is_active = request()->status;
        return $module->save() || false;
    }

    public function storeNewModule()
    {
        $module = new Module();

        if($this->moduleFillData($module)){
            return true;
        }
        return false;
    }

    public function updateModule($id)
    {
        $module = Module::findOrFail($id);
        if($this->moduleFillData($module)){
            return true;
        }
        return false;
    }
}
