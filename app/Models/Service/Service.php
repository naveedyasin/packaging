<?php

namespace App\Models\Service;

use App\Models\ModelTrait;
use App\Traits\ServiceTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use ModelTrait;
    use ServiceTrait;

    protected $guarded = [];

}
