<?php

namespace App\Http\Controllers\Backend\Box;

use App\Events\Backend\Post\PostCreatedEvent;
use App\Events\Backend\Post\PostUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Admin\Admin;
use App\Models\Box\BoxCategory;
use App\Models\Box\Box;
use App\Repository\Backend\Box\BoxRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use UploadImage;
class BoxesController extends Controller
{
    protected $boxRepository;

    /**
     * PostsController constructor.
     *
     * @param  \App\Repository\Backend\Post\PostRepositoryInterface  $boxRepository
     */
    public function __construct(BoxRepositoryInterface $boxRepository)
    {
        $this->boxRepository = $boxRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.box.box.index');
    }

    /**
     * @return mixed
     */
    public function getDataTable()
    {
        return $this->boxRepository->getForDataTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.box.create')){
            abort(403);
        }
        $box = new Box();
        $categories = BoxCategory::latest()->active(1)->get();
        return view('backend.box.box.create')
            ->withBox($box)
            ->withCategories($categories)
            ->withBoxCategories($box->categories->pluck('id')->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Post\CreatePostRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $postData = [
            'admin_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'status' => $request->status,
            'excerpt' => $request->excerpt,
            'allow_comments' => 0,
        ];
        if ($request->has('allow_comments')) {
            $postData['allow_comments'] = 1;
        }

        if ($post = $this->postRepository->create($postData)) {
            if($request->has('image')){
                $filenametostore = UploadImage::upload($request->file('image'));
                $post->update([
                    'image' => $filenametostore,
                ]);
            }
            event(new PostCreatedEvent($post));
//            $this->storeImage($post);
        }
        //        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.post.index')->with('success', 'Post created successfully');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!hasPermissions('admin.post.edit')){
            abort(403);
        }
        $post = $this->postRepository->getById($id);
        $categories = Category::latest()->active(1)->get();
        $tags = Tag::latest()->active(1)->get();
        return view('backend.blog.post.edit')
            ->withPost($post)
            ->withCategories($categories)
            ->withTags($tags)
            ->withPostCategories($post->categories->pluck('id')->all())
            ->withPostTags($post->tags->pluck('id')->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Post\UpdatePostRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $postData = [
            'admin_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'status' => $request->status,
            'excerpt' => $request->excerpt,
            'allow_comments' => 0,
        ];
        if ($request->has('allow_comments')) {
            $postData['allow_comments'] = 1;
        }

        if ($post = $this->postRepository->update($id, $postData)) {
            if($request->has('image')){
                if(Storage::disk('public')->exists('images/'. $post->image)){
                    Storage::delete('public/images/'. $post->image);
                }
                if(Storage::disk('public')->exists('images/mid/'. $post->image)){
                    Storage::delete('public/images/mid/'. $post->image);
                }
                if(Storage::disk('public')->exists('images/thumb'. $post->image)){
                    Storage::delete('public/images/thumb/'. $post->image);
                }
                $filenametostore = UploadImage::upload($request->file('image'));
                $post->update([
                    'image' => $filenametostore,
                ]);
            }
            event(new PostUpdatedEvent($post));
        }
        //        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.post.index')->with('success', 'Post updated successfully');
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
        if(!hasPermissions('admin.post.destroy')){
            abort(403);
        }
        $this->postRepository->delete($id);
        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully');
    }

    /**
     * @param $post
     */
    private function storeImage($post)
    {
        if (request()->has('image')) {
            //get filename with extension
            $filenamewithextension = request()->file('image')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = request()->file('image')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            //small thumbnail name
            //            $smallthumbnail = $filename.'_small_'.time().'.'.$extension;
            //medium thumbnail name
            /*$mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;
            //large thumbnail name
            $largethumbnail = $filename.'_large_'.time().'.'.$extension;*/
            //Upload File
            request()->file('image')->storeAs('public/images', $filenametostore);
            request()->file('image')->storeAs('public/images/thumbnail', $filenametostore);
            /*request()->file('image')->storeAs('public/images/thumbnail', $mediumthumbnail);
            request()->file('image')->storeAs('public/images/thumbnail', $largethumbnail);*/
            //create small thumbnail
            $actualImage = public_path('storage/images/' . $filenametostore);
            $smallthumbnailpath = public_path('storage/images/thumbnail/' . $filenametostore);
            $this->createThumbnail($smallthumbnailpath, 150, 93);
            //create medium thumbnail
            /*$mediumthumbnailpath = public_path('storage/images/thumbnail/'.$mediumthumbnail);
            $this->createThumbnail($mediumthumbnailpath, 300, 185);
            //create large thumbnail
            $largethumbnailpath = public_path('storage/images/thumbnail/'.$largethumbnail);
            $this->createThumbnail($largethumbnailpath, 550, 340);*/

            $post->update([
                'image' => $filenametostore,
            ]);
        }
    }

    /**
     * @param $path
     * @param $width
     * @param $height
     */
    private function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
