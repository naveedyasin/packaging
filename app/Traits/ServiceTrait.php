<?php


namespace App\Traits;

use App\Models\Blog\Category;

trait ServiceTrait
{

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable')->withTimestamps();
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
            ' . $this->getEditButtonAttribute('admin.service.edit', 'admin.service.edit') . '
            ' . $this->getDeleteButtonAttribute('admin.service.destroy', 'admin.service.destroy') . '
        </div>';
    }
}
