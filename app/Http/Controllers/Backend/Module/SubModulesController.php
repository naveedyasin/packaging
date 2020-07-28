<?php

namespace App\Http\Controllers\Backend\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Module\StoreSubModuleRequest;
use App\Http\Requests\Module\UpdateSubModuleRequest;
use App\Models\Module\SubModule;
use App\Repository\Backend\Module\SubModuleRepository;
use App\Services\SubModuleFormFields;
use Illuminate\Http\Request;

class SubModulesController extends Controller
{

    /**
     * @var \App\Repository\Backend\Module\SubModuleRepository
     */
    private $subModuleRepository;

    public function __construct(SubModuleRepository $subModuleRepository)
    {
        $this->subModuleRepository = $subModuleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = SubModule::paginate(15);
        return view('backend.submodule.index')->withModule($module);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.submodule.create')){
            abort(403);
        }
        $module = new SubModuleFormFields();
        $data = $module->handle();
        return view('backend.submodule.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Module\StoreSubModuleRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSubModuleRequest $request)
    {
        $this->subModuleRepository->storeNewSubModule();
        return redirect()->route('admin.sub-module.index')->with('success','Sub Module created successfully');
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
        if(!hasPermissions('admin.submodule.edit')){
            abort(403);
        }
        $module = new SubModuleFormFields($id);
        $data = $module->handle();
        return view('backend.submodule.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Module\UpdateSubModuleRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSubModuleRequest $request, $id)
    {
        $this->subModuleRepository->updateSubModule($id);
        return redirect()->route('admin.sub-module.index')->with('success','Sub Module updated successfully');
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
        if(!hasPermissions('admin.submodule.destroy')){
            abort(403);
        }
        SubModule::destroy($id);
        return redirect()->route('admin.sub-module.index')->with('success','Sub Module deleted successfully');
    }
}
