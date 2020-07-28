<div class="col-md-8">
    <!-- Basic layout-->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Post</h5>
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
                <input type="text" class="form-control" name="title" value="{{old('title', $post->title)}}" placeholder="Post title" required>
            </div>

            <div class="form-group">
                <label>Contents:</label>
                <textarea id="summernote" name="body" class="form-control">{{old('body', $post->body)}}</textarea>
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
                    <option value="published" @if($post->status == 'published') selected @endif>Published</option>
                    <option value="pending" @if($post->status == 'pending') selected @endif>Pending</option>
                    <option value="draft" @if($post->status == 'draft') selected @endif>Draft</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card card-collapsed">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Categories</h6>
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
                <label>Select Categories:</label>
                <select multiple name="categories[]" id="categories" class="form-control select" data-fouc>
                    @if($categories->count())
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ is_array(old('categories')) ? (in_array($category->id, old('categories')) ? 'selected' : '') : (in_array($category->id, $postCategories) ? 'selected' : '') }}>{{$category->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="card card-collapsed">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Tags</h6>
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
                <label>Select Tags:</label>
                <select multiple name="tags[]" id="tags" class="form-control select" data-fouc>
                    @if($tags->count())
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ is_array(old('tags')) ? (in_array($tag->id, old('tags')) ? 'selected' : '') : (in_array($tag->id, $postTags) ? 'selected' : '') }}>{{$tag->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="card card-collapsed">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Featured Image</h6>
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
    <div class="card card-collapsed">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Excerpt</h6>
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
                <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="form-control">{{ old('excerpt',$post->excerpt) }}</textarea>
            </div>
        </div>
    </div>
    <div class="card card-collapsed">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Discussion</h6>
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
                        <input type="checkbox" name="allow_comments" id="allow_comments" class="form-check-input-styled" {{old('allow_comments') == 'on' || $post->allow_comments ? 'checked' : ''}} data-fouc>
                        Allow Comments
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
