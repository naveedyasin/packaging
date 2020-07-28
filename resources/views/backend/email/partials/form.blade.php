<div class="col-md-8">
    <!-- Basic layout-->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Email information</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label>Purpose:</label>
                <input type="text" class="form-control" name="purpose" value="{{$purpose}}" placeholder="Purpose of email" required>
            </div>
            <div class="form-group">
                <label>Subject:</label>
                <input type="text" class="form-control" name="subject" value="{{$subject}}" placeholder="Email subject" required>
            </div>
            <div class="form-group">
                <label>Sender Name:</label>
                <input type="text" class="form-control" name="from_name" value="{{$from_name}}" placeholder="Sender name" required>
            </div>
            <div class="form-group">
                <label>Sender Email:</label>
                <input type="text" class="form-control" name="from_email" value="{{$from_email}}" placeholder="Sender email" required>
            </div>
            <div class="form-group">
                <label>Reply To Email:</label>
                <input type="text" class="form-control" name="reply_to_email" value="{{$reply_to_email}}" placeholder="Reply to email">
            </div>
            <div class="form-group">
                <label>Contents:</label>
                <textarea id="summernote" name="contents" class="form-control">{{$contents}}</textarea>
            </div>

            <div class="text-right">
                <a href="{{route('admin.email.index')}}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Save <i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>

</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">More Information</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label>Email Type:</label>
                <select class="form-control select" data-fouc name="email_type">
                    <option value="common" @if($email_type == 'common') selected @endif>Common</option>
                    <option value="notification" @if($email_type == 'notification') selected @endif>Notification</option>
                </select>
            </div>
            <div class="form-group">
                <label>To Emails:</label>
                <textarea name="to_email" rows="4" cols="4" class="form-control elastic" placeholder="To email address">{{$to_email}}</textarea>
                <span class="form-text text-muted">Add each email on new line, with pattern e.g John Doe &lt;example@yahoo.com&gt;</span>
            </div>
            <div class="form-group">
                <label>CC Emails:</label>
                <textarea name="cc_email" rows="4" cols="4" class="form-control elastic" placeholder="CC email addresses">{{$cc_email}}</textarea>
                <span class="form-text text-muted">Add each email on new line, with pattern e.g John Doe &lt;example@yahoo.com&gt;</span>
            </div>
            <div class="form-group">
                <label>BCC Emails:</label>
                <textarea name="bcc_email" rows="4" cols="4" class="form-control elastic" placeholder="BCC email address">{{$bcc_email}}</textarea>
                <span class="form-text text-muted">Add each email on new line, with pattern e.g John Doe &lt;example@yahoo.com&gt;</span>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="active" id="active" class="form-check-input-styled" {{$active ? 'checked' : ''}}>
                        Active
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="is_promotional" id="is_promotional" class="form-check-input-styled" {{$is_promotional ? 'checked' : ''}} data-fouc>
                        Promotional
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/form_validation.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/inputs/autosize.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.form-check-input-styled').uniform();
            autosize($('.elastic'));
            $('.select').select2({
                placeholder: 'Select',
                minimumResultsForSearch: Infinity
            });
            $('#summernote').summernote({
                height: 300,
                tabsize: 2
            });
        });
    </script>
@endpush
