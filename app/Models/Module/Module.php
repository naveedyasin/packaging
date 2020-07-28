<?php

namespace App\Models\Module;

use App\Models\ModelTrait;
use App\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use ModelTrait;
    use ModuleTrait;
    protected $guarded = [];

}
