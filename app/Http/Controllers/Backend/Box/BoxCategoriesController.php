<?php

namespace App\Http\Controllers\Backend\Box;

use App\Events\Backend\Category\CategoryCreatedEvent;
use App\Events\Backend\Category\CategoryDeletedEvent;
use App\Events\Backend\Category\CategoryUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoxCategory\CreateCategoryRequest;
use App\Http\Requests\BoxCategory\UpdateCategoryRequest;
use App\Models\Box\BoxCategory;
use App\Services\BoxCategoryFormFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BoxCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        return view('backend.box.category.index');
    }

    public function getDataTable()
    {
        return Datatables::of(BoxCategory::countBoxes('boxes')->latest()->get())
            ->escapeColumns(['name', 'slug', 'description'])
            ->addColumn(
                'status',
                function ($category) {
                    return $category->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                }
            )
            ->addColumn(
                'created_at',
                function ($category) {
                    if ($category->created_at) {
                        return $category->created_at->format('j F Y h:i');
                    }
                }
            )
            ->addColumn(
                'posts_count',
                function ($category) {
                    return $category->posts_count;
                }
            )
            ->addColumn(
                'actions',
                function ($category) {
                    return $category->action_buttons;
                }
            )
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.boxcategory.create')){
            abort(403);
        }
        $category = new BoxCategoryFormFields();
        $data = $category->handle();
        return view('backend.box.category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        if ($request->categoryFillData()) {
            return redirect()->route('admin.boxcategory.index')->with(
                'success',
                'Category created successfully.'
            );
        } else {
            return redirect()->route('admin.boxcategory.index')->with(
                'error',
                'There is an error saving record'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
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
        if(!hasPermissions('admin.boxcategory.edit')){
            abort(403);
        }
        $category = new BoxCategoryFormFields($id);
        $data = $category->handle();
        return view('backend.box.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        if ($request->categoryFillData($id)) {
            return redirect()->route('admin.boxcategory.index')->with(
                'success',
                'Category updated successfully.'
            );
        }
        return redirect()->route('admin.boxcategory.edit', $id)->with(
            'error',
            'There is an error updating category.'
        );
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
        if(!hasPermissions('admin.boxcategory.destroy')){
            abort(403);
        }
        $category = BoxCategory::findOrFail($id);
        $category->delete();
        // event(new CategoryDeletedEvent($category));
        return redirect()->route('admin.boxcategory.index')->with(
            'success',
            'Category deleted successfully.'
        );
    }
}
