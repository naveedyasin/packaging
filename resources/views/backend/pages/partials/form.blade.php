<div class="col-md-8">
    <!-- Basic layout-->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Page</h5>
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
                <label>Title:</label>
                <input type="text" class="form-control" name="title" value="{{$title}}" placeholder="Page title" required>
            </div>
            <div class="form-group">
                <label>Slug:</label>
                <input type="text" class="form-control" name="slug" value="{{$slug}}" placeholder="Page slug" required>
            </div>

            <div class="form-group">
                <label>Contents:</label>
                <textarea id="summernote" name="body" class="form-control">{{$contents}}</textarea>
            </div>

            <div class="text-right">
                <a href="{{route('admin.page.index')}}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Publish <i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>

</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Status & Visibility</h6>
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
                <label>Status:</label>
                <select class="form-control select" data-fouc name="status">
                    <option value="1" {{ $status ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ !$status ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">SEO</h6>
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
                <label>Meta Title:</label>
                <input type="text" class="form-control" name="meta_title" placeholder="Meta title" value="{{$meta_title}}">
            </div>
            <div class="form-group">
                <label>Meta Keywords:</label>
                <input type="text" class="form-control" name="meta_keywords" placeholder="Meta keywords" value="{{$meta_keywords}}">
            </div>
            <div class="form-group">
                <label>Meta Description:</label>
                <textarea name="meta_description" id="meta_description" cols="30" rows="10" placeholder="Meta description" class="form-control">{{ $meta_description }}</textarea>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="crawlable" id="crawlable" class="form-check-input-styled" {{$crawlable ? 'checked' : ''}} data-fouc>
                        Crawlable
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
    <script src="{{ asset('admin/plugins/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/uploader_bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.form-check-input-styled').uniform();
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
