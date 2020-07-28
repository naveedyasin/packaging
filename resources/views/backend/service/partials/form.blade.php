<div class="col-md-8">
    <!-- Basic layout-->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Service</h5>
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
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="{{$name}}" required>
            </div>

            <div class="form-group">
                <label>Select Categories:</label>
                <select multiple name="categories[]" id="categories" class="form-control select" data-fouc>
                    @if($categories->count())
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ is_array(old('categories')) ? (in_array($category->id, old('categories')) ? 'selected' : '') : (in_array($category->id, $serviceCategories) ? 'selected' : '') }}>{{$category->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Contents:</label>
                <textarea id="summernote" name="contents" class="form-control">{{$contents}}</textarea>
            </div>

            <div class="text-right">
                <a href="{{route('admin.post.index')}}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Publish <i class="icon-paperplane ml-2"></i></button>
            </div>
        </div>
    </div>

</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Image</h6>
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
                <input type="file" name="image" class="file-input-overwrite" data-fouc>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Short Description</h6>
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
                <label>Write an excerpt (optional):</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control">{{ $excerpt }}</textarea>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Visibility</h6>
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
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="active" id="active" class="form-check-input-styled" {{ $active ? 'checked' : ''}} data-fouc>
                        Active
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="display_on_home" id="display_on_home" class="form-check-input-styled" {{ $display_on_home ? 'checked' : ''}} data-fouc>
                        Display on home
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
