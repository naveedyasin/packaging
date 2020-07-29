<?php


namespace App\Repository\Backend\Box;


// use App\Events\Backend\Box\PostDeletedEvent;
use App\Models\Box\Box;
use Yajra\DataTables\Facades\DataTables;

class BoxRepository implements BoxRepositoryInterface
{

    /**
     * @var \App\Models\Box\Box
     */
    private $box;

    public function __construct(Box $box)
    {
        $this->box = $box;
    }

    public function getForDataTable()
    {
        return Datatables::of($this->getAll())
            ->escapeColumns([])
            ->addColumn(
                'preview',
                function ($box) {
                    return '<a href="' . asset('storage/images/' . $box->image) . '" data-popup="lightbox">
                    <img src="' . asset('storage/images/' . $box->image) . '" alt="" class="img-preview rounded" width="50" height="50">
                </a>';
                }
            )
            ->addColumn(
                'title',
                function ($box) {
                    return $box->title;
                }
            )
            ->addColumn(
                'author',
                function ($box) {
                    return $box->admin->full_name;
                }
            )
            ->addColumn(
                'categories',
                function ($box) {
                    return implode(', ', $this->generateData($box->categories));
                }
            )
            ->addColumn(
                'created_at',
                function ($box) {
                    if ($box->created_at) {
                        return $box->created_at->format('j M Y');
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
            return $this->box->latest()->get();
        }
        return $this->box->where('admin_id', auth()->id())->get();
    }

    public function getById(int $id)
    {
        return $this->box->findOrFail($id);
    }

    public function create(array $attributes)
    {
        $box = $this->box->create($attributes);
        $this->attachPermissionsAndTags($box);
        return $box;
    }

    public function update(int $id, array $attributes)
    {
        $box = $this->getById($id);
        $box->update($attributes);
        $this->attachPermissionsAndTags($box);
        return $box;
    }

    private function attachPermissionsAndTags(Box $box)
    {
        if (request()->categories != '') {
            $box->categories()->sync(request()->categories);
        }
    }

    public function delete(int $id)
    {
        $box = $this->getById($id);
        $box->delete();
        // event(new PostDeletedEvent($post));
        return true;
    }
}
