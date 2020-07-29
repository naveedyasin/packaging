<?php

namespace App\Models\Module;
use App\Models\ModelTrait;
use App\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ActiveScope;
class Module extends Model
{
    use ModelTrait;
    use ModuleTrait;
    protected $guarded = [];

    /**
     * Set global active scope
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
        static::addGlobalScope('position', function (Builder $builder) {
            $builder->orderBy('position', 'asc');
        });
    }

}
