<?php


namespace App\Composers;


use App\Models\Module\Module;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ModuleComposer
{
    /**
     * @var \App\Models\Module\Module
     */
    private $modules;

    public function __construct()
    {
        Cache::forget('modules');
        if(Cache::has('modules')){
            $this->modules = Cache::get('modules');
        }else {
            $this->modules = Module::with('sub_modules')->get();
            Cache::forever('modules', $this->modules);
        }
    }

    public function compose(View $view)
    {
        $view->with('modules', $this->modules);
    }
}
