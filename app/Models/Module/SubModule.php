<?php

namespace App\Models\Module;

use App\Models\ModelTrait;
use App\Traits\SubModuleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ActiveScope;
class SubModule extends Model
{
    use ModelTrait;
    use SubModuleTrait;

    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
        static::addGlobalScope('position', function (Builder $builder) {
            $builder->orderBy('position', 'asc');
        });
    }
}
