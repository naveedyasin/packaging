<?php

namespace App\Models\Blog;

use App\Models\ModelTrait;
use App\Traits\CategoryTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryTrait;
    use ModelTrait;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
