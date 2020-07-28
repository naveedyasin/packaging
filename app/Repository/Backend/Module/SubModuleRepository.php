<?php


namespace App\Repository\Backend\Module;

use App\Models\Module\SubModule;

class SubModuleRepository
{

    public function subModuleFillData($module)
    {
        $module->name = request()->name;
        $module->module_id = request()->module_id;
        $module->route = request()->route;
        $module->position = request()->position;
        $module->is_active = request()->status;
        return $module->save() || false;
    }

    public function storeNewSubModule()
    {
        $module = new SubModule();

        if($this->subModuleFillData($module)){
            return true;
        }
        return false;
    }

    public function updateSubModule($id)
    {
        $module = SubModule::findOrFail($id);
        if($this->subModuleFillData($module)){
            return true;
        }
        return false;
    }
}
