<?php

namespace App\Http\Controllers\Backend\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Module\StoreModuleRequest;
use App\Models\Module\Module;
use App\Repository\Backend\Module\ModuleRepository;
use App\Services\ModuleFormFields;
use Illuminate\Http\Request;

class ModulesController extends Controller
{

    /**
     * @var \App\Repository\Backend\Email\ModuleRepository
     */
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::paginate(15);
        return view('backend.module.index')->withModule($module);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.module.create')){
            abort(403);
        }
        $module = new ModuleFormFields();
        $data = $module->handle();
        return view('backend.module.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Module\StoreModuleRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreModuleRequest $request)
    {
        $this->moduleRepository->storeNewModule();
        return redirect()->route('admin.module.index')->with('success','Module created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if(!hasPermissions('admin.module.edit')){
            abort(403);
        }
        $module = new ModuleFormFields($id);
        $data = $module->handle();
        return view('backend.module.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->moduleRepository->updateModule($id);
        return redirect()->route('admin.module.index')->with('success','Module updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(!hasPermissions('admin.module.destroy')){
            abort(403);
        }
        Module::destroy($id);
        return redirect()->route('admin.module.index')->with('success','Module deleted successfully');
    }
}
