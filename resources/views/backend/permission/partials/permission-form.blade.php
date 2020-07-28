<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ $name }}" placeholder="Permission name" required>
</div>

<div class="form-group">
    <label>Permission Slug:</label>
    <input type="text" class="form-control" placeholder="Permission slug here" name="slug" value="{{ $slug }}" required>
</div>

<div class="form-group">
    <label>Description:</label>
    <textarea name="description" id="description" cols="30"
              rows="5" class="form-control">{{ $description }}</textarea>
</div>

<div class="form-group">
    <label>Model:</label>
    <select name="model" id="model" class="form-control">
        @foreach ($permissionModels as $permissionModel)
            <option @if ($permissionModel == $model) selected @endif value="{{ $permissionModel }}">
                {{ $permissionModel }}
            </option>}
        @endforeach
    </select>
</div>
<div class="text-right">
    <a href="{{route('admin.permission.index')}}" class="btn btn-default">Back</a>
    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
</div>
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/form_validation.js') }}"></script>
@endpush
