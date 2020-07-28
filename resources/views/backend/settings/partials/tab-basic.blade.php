<div class="tab-pane fade show active" id="basic">
    <form action="{{route('admin.basic.settings', $setting->id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        @if($setting->favicon)
        <div class="form-group row">
            <label class="col-form-label col-lg-3"></label>
            <div class="col-lg-9">
                <img class="img-preview rounded" src="{{asset('storage/'.$setting->favicon)}}" alt="Favicon">
            </div>
        </div>
        @endif
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Favicon</label>
            <div class="col-lg-9">
                <input type="file" name="favicon" class="form-control-uniform" data-fouc>
            </div>
        </div>
        @if($setting->logo)
            <div class="form-group row">
                <label class="col-form-label col-lg-3"></label>
                <div class="col-lg-9">
                    <img class="img-preview rounded" src="{{asset('storage/'.$setting->logo)}}" alt="Logo">
                </div>
            </div>
        @endif
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Logo</label>
            <div class="col-lg-9">
                <input type="file" name="logo" class="form-control-uniform" data-fouc>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Website Title:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="IIlogics" name="website_title" value="{{ $setting->website_title }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Contact Email:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="info@example.com" name="contact_email" value="{{ $setting->contact_email }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Contact Number:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="92343242344" name="contact_number" value="{{ $setting->contact_number }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">From Email Name:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="from_name" value="{{ $setting->from_name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">From Email Address:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="from_email" value="{{ $setting->from_email }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Custom css in header:</label>
            <div class="col-lg-9">
                <textarea name="custom_css" class="form-control" id="css_editor" cols="30" rows="10">{{ $setting->custom_css }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Custom JS in footer:</label>
            <div class="col-lg-9">
                <textarea name="custom_js" class="form-control" id="javascript_editor" cols="30" rows="10">{{ $setting->custom_js }}</textarea>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/editors/ace/ace.js') }}"></script>
    <script>
        $(function () {
            // Javascript editor
            var js_editor = ace.edit('javascript_editor');
            js_editor.setTheme('ace/theme/monokai');
            js_editor.getSession().setMode('ace/mode/javascript');
            js_editor.setShowPrintMargin(false);

            // CSS editor
            var css_editor = ace.edit('css_editor');
            css_editor.setTheme('ace/theme/monokai');
            css_editor.getSession().setMode('ace/mode/css');
            css_editor.setShowPrintMargin(false);
        });
    </script>
@endpush
