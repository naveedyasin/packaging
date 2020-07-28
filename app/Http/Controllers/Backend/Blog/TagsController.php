<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Events\Backend\Tag\TagCreatedEvent;
use App\Events\Backend\Tag\TagDeletedEvent;
use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.blog.tag.index');
    }

    public function getDataTable()
    {
        if(request()->ajax()) {
            return Datatables::of(Tag::latest()->get())
                ->escapeColumns(['name', 'slug', 'description'])
                ->addColumn('status', function ($tag) {
                    return $tag->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->addColumn('created_at', function ($tag) {
                    if ($tag->created_at) {
                        return $tag->created_at->format('j F Y h:i');
                    }
                })
                ->addColumn('actions', function ($tag) {
                    return '<div class="list-icons">
                        <a href="#" class="list-icons-item edit" id="'.$tag->id.'">
                        <i class="icon-pencil7"></i></a>
                        <a href="#" id="'.$tag->id.'" class="delete list-icons-item"><i class="icon-trash"></i></a>
                    </div>';
                })
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if(!hasPermissions('admin.tag.create')){
            abort(403);
        }
        $rules = array(
            'name'    =>  'required|min:2|max:100',
            'slug'    =>  'required|unique:tags,slug',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->slug);
        $tag->description = $request->description;
        $tag->status = false;
        if($request->has('status')){
            $tag->status = true;
        }
        if($tag = $tag->save()){
            event(new TagCreatedEvent($tag));
            return response()->json(['success' => 'Tag created successfully.']);
        }else {
            return response()->json(['errors' => 'There is an error saving record']);
        }
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        if(!hasPermissions('admin.tag.edit')){
            abort(403);
        }
        if(request()->ajax())
        {
            $data = Tag::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        if(!hasPermissions('admin.tag.edit')){
            abort(403);
        }
        $tag = Tag::findOrFail($request->hidden_id);
        $rules = array(
            'name'    =>  'required|min:2|max:100',
            'slug'    =>  $tag->slug != $request->slug ? 'required|unique:tags,slug' : 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'          =>  $request->name,
            'slug'          =>  Str::slug($request->slug),
            'description'  =>  $request->description,
        );
        $form_data['status'] = false;
        if($request->has('status')){
            $form_data['status'] = true;
        }
        Tag::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Tag is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        if(!hasPermissions('admin.tag.destroy')){
            abort(403);
        }
        $tag = Tag::findOrFail($id);
        $tag->delete();
        event(new TagDeletedEvent($tag));
    }
}
