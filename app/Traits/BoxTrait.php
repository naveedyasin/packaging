<?php


namespace App\Traits;


use App\Models\Admin\Admin;
use App\Models\Box\BoxCategory;

trait BoxTrait
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function categories()
    {
        return $this->morphToMany(BoxCategory::class, 'categoryable')->withTimestamps();
//        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
            '.$this->getEditButtonAttribute('admin.post.edit', 'admin.post.edit').'
            '.$this->getDeleteButtonAttribute('admin.post.destroy', 'admin.post.destroy').'
        </div>';
    }

    public function scopeActive($query, $arg)
    {
        return $query->where('status', $arg);
    }
}
