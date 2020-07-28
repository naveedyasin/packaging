<?php


namespace App\Repository\Backend\Email;


use App\Models\Email\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EmailRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Email::latest()->get())
            ->escapeColumns(['subject','email_reference', 'purpose'])
            ->addColumn('active', function ($email) {
                return $email->active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-active</span>';
            })
            ->addColumn('actions', function ($email) {
                return $email->action_buttons;
            })
            ->make(true);
    }

    public function emailFillData($email, $id = null)
    {
        $email->purpose = request()->purpose;
        $email->subject = request()->subject;
        if(is_null($id)) {
            $email->email_reference = Str::random(8);
            $email->created_by = Auth::id();
        }
        if($id){
            $email->updated_by = Auth::id();
        }
        $email->from_name = request()->from_name;
        $email->from_email = request()->from_email;
        $email->to_email = request()->to_email;
        $email->cc_email = request()->cc_email;
        $email->bcc_email = request()->bcc_email;
        $email->reply_to_email = request()->reply_to_email;
        $email->contents = request()->contents;
        $email->is_promotional = request()->has('is_promotional') ? 1 : 0;
        $email->email_type = request()->email_type;
        $email->active = request()->has('active') ? 1 : 0;
        return $email->save() || false;
    }

    public function storeNewEmail()
    {
        $email = new Email();

        if($this->emailFillData($email)){
            return true;
        }
        return false;
    }

    public function updateEmail($id)
    {
        $email = Email::findOrFail($id);
        if($this->emailFillData($email, $id)){
            return true;
        }
        return false;
    }
}
