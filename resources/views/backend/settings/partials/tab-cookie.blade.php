<div class="tab-pane fade" id="cookie">
    <form action="{{route('admin.cookie.settings', $setting->id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Cookie Button Text:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="keywords" name="cookie_alert_btn_text" value="{{ $setting->cookie_alert_btn_text }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Cookie Text:</label>
            <div class="col-lg-9">
                <textarea name="cookie_alert_text" class="form-control" id="summernote">{{ $setting->cookie_alert_text }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Show Cookie Bar:</label>
            <div class="col-lg-9">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="cookie_alert" id="cookie_alert" class="form-check-input-styled" {{old('cookie_alert') == 'on' || $setting->cookie_alert ? 'checked' : ''}} data-fouc>
                    </label>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
