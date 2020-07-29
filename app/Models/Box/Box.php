<?php

namespace App\Models\Box;

use App\Models\ModelTrait;
use App\Traits\BoxTrait;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use BoxTrait;
    use ModelTrait;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
