@csrf
<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{ $name }}" placeholder="Role name" required>
</div>
<div class="form-group">
    <label>Slug:</label>
    <input type="text" class="form-control" placeholder="Role slug here" name="slug" value="{{ $slug }}" required>
</div>
<div class="form-group">
    <label>Level:</label>
    <input type="number" id="level" name="level" min="0" step="1" onkeypress="return event.charCode >= 48" class="form-control" value="{{ $level }}" placeholder="Enter level" required>
</div>
<div class="form-group">
    <label>Permissions:</label>
    <select name="permissions[]" multiple="multiple" class="form-control form-control-select2" data-fouc>
        @foreach ($allPermissions as $permission)
            <option @if (in_array($permission->id, $rolePermissionsIds)) selected @endif value="{{ $permission }}">
                {{ $permission->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Level:</label>
    <textarea id="description" name="description" class="form-control" placeholder="Permission description">{{ $description }}</textarea>
</div>
<div class="text-right">
    <a href="{{route('admin.role.index')}}" class="btn btn-default">Back</a>
    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
</div>
