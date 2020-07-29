<?php


namespace App\Traits;


use App\Models\Box\Box;

trait BoxCategoryTrait
{
    public function boxes()
    {
        return $this->morphedByMany(Box::class, 'categoryable',null,'category_id')->withTimestamps();
//        return $this->belongsToMany(Post::class)->withTimestamps();
    }
    public function subcategory(){
        return $this->hasMany('App\Models\Box\BoxCategory', 'parent_id');
    }

    public function scopeActive($query, $arg)
    {
        return $query->where('status', $arg);
    }

    public function scopeCountBoxes($query, $arg)
    {
        return $query->withCount($arg);
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    '.$this->getViewButtonAttribute('admin.boxcategory.show', 'admin.boxcategory.show').'
                    '.$this->getEditButtonAttribute('admin.boxcategory.edit', 'admin.boxcategory.edit').'
                    '.$this->getDeleteButtonAttribute('admin.boxcategory.destroy', 'admin.boxcategory.destroy').'
                </div>';
    }
}
