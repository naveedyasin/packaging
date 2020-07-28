<?php

namespace App\Observers\Page;

use App\Models\Page\Page;
use Illuminate\Support\Facades\Auth;

class PagesObserver
{
    /**
     * Handle the page "created" event.
     *
     * @param  \App\Models\Page\Page  $page
     * @return void
     */
    public function created(Page $page)
    {
    }

    /**
     * @param  \App\Models\Page\Page  $page
     */
    public function saving(Page $page)
    {
        $page->created_by = Auth::user()->id;
    }

    /**
     * @param  \App\Models\Page\Page  $page
     */
    public function updating(Page $page)
    {
        $page->updated_by = Auth::user()->id;
    }

    /**
     * Handle the page "updated" event.
     *
     * @param  \App\Models\Page\Page  $page
     * @return void
     */
    public function updated(Page $page)
    {
        $page->updated_by = Auth::user()->id;
    }

    /**
     * Handle the page "deleted" event.
     *
     * @param  \App\Models\Page\Page  $page
     * @return void
     */
    public function deleted(Page $page)
    {
        //
    }

    /**
     * Handle the page "restored" event.
     *
     * @param  \App\Models\Page\Page  $page
     * @return void
     */
    public function restored(Page $page)
    {
        //
    }

    /**
     * Handle the page "force deleted" event.
     *
     * @param  \App\Models\Page\Page  $page
     * @return void
     */
    public function forceDeleted(Page $page)
    {
        //
    }
}
