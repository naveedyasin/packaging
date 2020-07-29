<?php

namespace App\Models\Box;

use App\Models\ModelTrait;
use App\Traits\BoxCategoryTrait;
use Illuminate\Database\Eloquent\Model;

class BoxCategory extends Model
{
    use BoxCategoryTrait;
    use ModelTrait;

    protected $table = 'box_categories';

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
