<?php


namespace App\Repository\Backend\Post;


use App\Events\Backend\Post\PostDeletedEvent;
use App\Models\Blog\Post;
use Yajra\DataTables\Facades\DataTables;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @var \App\Models\Blog\Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getForDataTable()
    {
        return Datatables::of($this->getAll())
            ->escapeColumns([])
            ->addColumn(
                'preview',
                function ($post) {
                    return '<a href="' . asset('storage/images/' . $post->image) . '" data-popup="lightbox">
                    <img src="' . asset('storage/images/' . $post->image) . '" alt="" class="img-preview rounded" width="50" height="50">
                </a>';
                }
            )
            ->addColumn(
                'title',
                function ($post) {
                    return $post->title;
                }
            )
            ->addColumn(
                'author',
                function ($post) {
                    return $post->admin->full_name;
                }
            )
            ->addColumn(
                'categories',
                function ($post) {
                    return implode(', ', $this->generateData($post->categories));
                }
            )
            ->addColumn(
                'tags',
                function ($post) {
                    return implode(', ', $this->generateData($post->tags));
                }
            )
            ->addColumn(
                'created_at',
                function ($post) {
                    if ($post->created_at) {
                        return $post->created_at->format('j M Y');
                    }
                }
            )
            ->addColumn(
                'actions',
                function ($user) {
                    return $user->action_buttons;
                }
            )
            ->make(true);
    }

    private function generateData($data)
    {
        $array = [];
        if (!empty($data)) {
            foreach ($data as $d) {
                $array[] = $d->name;
            }
        }
        return $array;
    }

    public function getAll()
    {
        if(auth()->user()->hasRole('admin')){
            return $this->post->latest()->get();
        }
        return $this->post->where('admin_id', auth()->id())->get();
    }

    public function getById(int $id)
    {
        return $this->post->findOrFail($id);
    }

    public function create(array $attributes)
    {
        $post = $this->post->create($attributes);
        $this->attachPermissionsAndTags($post);
        return $post;
    }

    public function update(int $id, array $attributes)
    {
        $post = $this->getById($id);
        $post->update($attributes);
        $this->attachPermissionsAndTags($post);
        return $post;
    }

    private function attachPermissionsAndTags(Post $post)
    {
        if (request()->categories != '') {
            $post->categories()->sync(request()->categories);
        }
        if (request()->tags != '') {
            $post->tags()->sync(request()->tags);
        }
    }

    public function delete(int $id)
    {
        $post = $this->getById($id);
        $post->delete();
        event(new PostDeletedEvent($post));
        return true;
    }
}
