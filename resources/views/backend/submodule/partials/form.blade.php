@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Parent Module:</label>
            <select class="form-control select" data-fouc name="module_id">
                @foreach ($modules as $module)
                    <option @if ($module->id == $module_id) selected @endif value="{{ $module->id }}">
                        {{ $module->name }}
                    </option>}
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" placeholder="Module name" class="form-control"
                   name="name" value="{{ $name }}" required>
        </div>
        <div class="form-group">
            <label>Route:</label>
            <input type="text" placeholder="Route name" class="form-control"
                   name="route" value="{{ $route}}" required>
        </div>
        <div class="form-group">
            <label>Position:</label>
            <input type="text" placeholder="Position of module" class="form-control"
                   name="position" value="{{ $position }}" required>
        </div>
        <div class="form-group">
            <label class="d-block">Status:</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-input-styled" name="status" value="1"
                           {{ $is_active ? 'checked' : '' }} data-fouc>
                    Active
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-input-styled" name="status" value="0"
                           {{ !$is_active ? 'checked' : '' }} data-fouc>
                    In-active
                </label>
            </div>
        </div>
        <div class="text-right">
            <a href="{{route('admin.module.index')}}" class="btn btn-default">Back</a>
            <button type="submit" class="btn btn-primary">Submit <i
                    class="icon-paperplane ml-2"></i>
            </button>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('.select').select2({
                placeholder: 'Select',
                minimumResultsForSearch: Infinity
            });
        })
    </script>
@endpush
