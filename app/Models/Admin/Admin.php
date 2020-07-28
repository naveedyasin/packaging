<?php

namespace App\Models\Admin;

use App\Contracts\HasRoleAndPermissionContract;
use App\Models\Admin\Attributes\AccessAttribute;
use App\Models\ModelTrait;
use App\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable implements HasRoleAndPermissionContract
{
//    use HasPermissionsTrait;
    use Notifiable;
    use ModelTrait;
    use AccessAttribute;
    use HasRoleAndPermission;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'is_active',
        'created_by',
        'updated_by',
        'last_login',
        'login_ip',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_login',
    ];
}
