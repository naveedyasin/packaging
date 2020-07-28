<div class="tab-pane fade" id="seo">
    <form action="{{route('admin.seo.settings', $setting->id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Meta Keywords:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="keywords" name="meta_keyword" value="{{ $setting->meta_keyword }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Meta Description:</label>
            <div class="col-lg-9">
                <textarea name="meta_description" class="form-control" id="" cols="30" rows="10">{{ $setting->meta_description }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Analytics Code:</label>
            <div class="col-lg-9">
                <textarea name="analytics_code" class="form-control" id="" cols="30" rows="10">{{ $setting->analytics_code }}</textarea>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
