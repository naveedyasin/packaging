<?php

namespace App\Http\Controllers\Backend\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\Email\StoreEmailRequest;
use App\Http\Requests\Email\UpdateEmailRequest;
use App\Models\Email\Email;
use App\Repository\Backend\Email\EmailRepository;
use App\Services\EmailFormFields;
use Illuminate\Http\Request;

class EmailsController extends Controller
{

    /**
     * @var \App\Repository\Backend\Email\EmailRepository
     */
    private $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.email.index');
    }

    public function getDataTable()
    {
        return $this->emailRepository->getForDataTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(!hasPermissions('admin.emai.create')){
            abort(403);
        }
        $email = new EmailFormFields();
        $data = $email->handle();
        return view('backend.email.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Email\StoreEmailRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmailRequest $request)
    {
        $this->emailRepository->storeNewEmail();
        return redirect()->route('admin.email.index')->with('success','Email created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::findOrFail($id);
        return view('backend.email.show')->withEmail($email);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if(!hasPermissions('admin.email.edit')){
            abort(403);
        }
        $service = new EmailFormFields($id);
        $data = $service->handle();
        return view('backend.email.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Email\UpdateEmailRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmailRequest $request, $id)
    {
        $this->emailRepository->updateEmail($id);
        return redirect()->route('admin.email.index')->with('success','Email updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(!hasPermissions('admin.email.destroy')){
            abort(403);
        }
        Email::destroy($id);
        return redirect()->route('admin.email.index')->with('success','Email deleted successfully');
    }
}
