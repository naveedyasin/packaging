<?php

namespace App\Models\Page;

use App\Models\ModelTrait;
use App\Traits\PageTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use ModelTrait;
    use PageTrait;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

}
