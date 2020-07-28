<?php


namespace App\Repository\Backend\Page;


use App\Events\Backend\Pages\PageCreated;
use App\Events\Backend\Pages\PageDeleted;
use App\Events\Backend\Pages\PageUpdated;
use App\Models\Page\Page;
use Yajra\DataTables\Facades\DataTables;

class PagesRepository implements PagesInterface
{

    /**
     * @var \App\Models\Page\Page
     */
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return $this->page->latest()->get();
    }

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->page->findOrFail($id);
    }


    /**
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        if($page = $this->page->create($attributes)){
            event(new PageCreated($page));
            return true;
        }
        return false;
    }


    /**
     * @param  int  $id
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function update(int $id, array $attributes)
    {
        $page = $this->getById($id);
        $page->update($attributes);
        event(new PageUpdated($page));
        return $page;
    }


    /**
     * @param  int  $id
     *
     * @return mixed|void
     */
    public function delete(int $id)
    {
        $page = $this->getById($id);
        $page->delete();
        event(new PageDeleted($page));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getForDataTable()
    {
        return Datatables::of($this->getAll())
            ->escapeColumns(['title','slug'])
            ->addColumn('status', function ($page) {
                    return $page->status ? '<span class="badge bg-success">Published</span>' : '<span class="badge bg-warning">Pending</span>';
            })
            ->addColumn('updated_at', function ($page) {
                if ($page->updated_at) {
                    return $page->updated_at->format('j M Y');
                }
            })
            ->addColumn('actions', function ($page) {
                return $page->action_buttons;
            })
            ->make(true);
    }
}
