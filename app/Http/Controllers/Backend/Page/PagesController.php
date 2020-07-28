<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page\Page;
use App\Repository\Backend\Page\PagesInterface;
use App\Services\PageFormFields;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesController extends Controller
{

    /**
     * @var \App\Repository\Backend\Page\PagesInterface
     */
    private $pageRepository;

    public function __construct(PagesInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @return mixed
     */
    public function getDataTable()
    {
        return $this->pageRepository->getForDataTable();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.page.create')){
            abort(403);
        }
        $page = new PageFormFields();
        $data = $page->handle();
        return view('backend.pages.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Page\CreatePageRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePageRequest $request)
    {
        $pageData = $request->pageFillData();
        $this->pageRepository->create($pageData);
//        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.page.index')->with('success', 'Page created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('backend.pages.show')->withPage($page);
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
        if(!hasPermissions('admin.page.edit')){
            abort(403);
        }
        $page = new PageFormFields($id);
        $data = $page->handle();
        return view('backend.pages.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Page\UpdatePageRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $pageData = $request->pageFillData();
        $this->pageRepository->update($id, $pageData);
//        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.page.index')->with('success', 'Page updated successfully');
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
        if(!hasPermissions('admin.page.destroy')){
            abort(403);
        }
        $this->pageRepository->delete($id);
        return redirect()->route('admin.page.index')->with('success', 'Page deleted successfully');
    }
}
