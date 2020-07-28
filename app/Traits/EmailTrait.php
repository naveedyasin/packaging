<?php


namespace App\Traits;


use App\Models\Admin\Admin;
use Illuminate\Support\Str;

/**
 * Written main functions for email model class
 *
 * @category Email_Model
 * @author   Imran ali <imran@wtwm.com>
 */
trait EmailTrait
{




    /**
     * Generate Actions buttons
     *
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="list-icons">
                    ' . $this->getViewButtonAttribute('admin.email.show', 'admin.email.show') . '
                    ' . $this->getEditButtonAttribute('admin.email.edit', 'admin.email.edit') . '
                    ' . $this->getDeleteButtonAttribute('admin.email.destroy', 'admin.email.destroy') . '
                </div>';
    }

    public function getCreatedByNameAttribute()
    {
        return Admin::where('id', $this->created_by)->get()->pluck('full_name')->first();
    }

    public function getUpdatedByNameAttribute()
    {
        return Admin::where('id', $this->updated_by)->get()->pluck('full_name')->first();
    }
    public function getStatusAttribute()
    {
        return $this->active ? 'Active' : 'In-active';
    }

    public function getPromotionalAttribute()
    {
        return $this->is_promotional ? 'Promotional' : 'Non Promotional';
    }
}
