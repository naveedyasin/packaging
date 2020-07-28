@extends('backend.app')
@section('template_title', 'Email Detail')
@section('header', 'Email Detail')
@section('content')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Email Detail <a href="{{route('admin.email.index')}}" class="btn btn-default">Back</a></h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-lg">
                    <tbody>
                    <tr>
                        <td class="wmin-md-100">Email Type</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->email_type }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Email Reference</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->email_reference }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Purpose</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->purpose }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Subject</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->subject }}</td>
                    </tr><tr>
                        <td class="wmin-md-100">From Name</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->from_name }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">From Email</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->from_email }}</td>
                    </tr><tr>
                        <td class="wmin-md-100">To</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->to_email }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">CC Email</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->cc_email }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">BCC Email</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->bcc_email }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Reply To</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->reply_to_email }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Status</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->status }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Category</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->promotional }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Created By</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->created_by_name }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Updated By</td>
                        <td class="wmin-md-350 font-weight-light text-muted">{{ $email->updated_by_name }}</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Created At</td>
                        <td class="wmin-md-350 font-weight-light text-muted">
                            @if($email->created_at )
                                {{ $email->created_at->format('d F Y H:i:s') }}
                            @endif</td>
                    </tr>
                    <tr>
                        <td class="wmin-md-100">Updated At</td>
                        <td class="wmin-md-350 font-weight-light text-muted">
                            @if($email->updated_at )
                                {{ $email->updated_at->format('d F Y H:i:s') }}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
