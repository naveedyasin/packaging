<?php

namespace App\Models\Email;

use App\Models\ModelTrait;
use App\Traits\EmailTrait;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use ModelTrait;
    use EmailTrait;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
