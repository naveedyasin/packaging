<?php

namespace App\Models\Blog;

use App\Models\ModelTrait;
use App\Traits\PostTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use PostTrait;
    use ModelTrait;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
