<?php


namespace App\Traits;



use App\Models\Admin\Admin;
use Illuminate\Support\Str;

trait PageTrait
{
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
            '.$this->getViewButtonAttribute('admin.page.show', 'admin.page.show').'
            '.$this->getEditButtonAttribute('admin.page.edit', 'admin.page.edit').'
            '.$this->getDeleteButtonAttribute('admin.page.destroy', 'admin.page.destroy').'
        </div>';
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedByNameAttribute()
    {
        return Admin::where('id', $this->created_by)->get()->pluck('full_name')->first();
    }

    public function getUpdatedByNameAttribute()
    {
        return Admin::where('id', $this->updated_by)->get()->pluck('full_name')->first();
    }

    public function scopeActive($query, $arg)
    {
        return $query->where('status', $arg);
    }
}
