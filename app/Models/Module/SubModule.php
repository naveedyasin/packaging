<?php

namespace App\Models\Module;

use App\Models\ModelTrait;
use App\Traits\SubModuleTrait;
use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    use ModelTrait;
    use SubModuleTrait;

    protected $guarded = [];
}
