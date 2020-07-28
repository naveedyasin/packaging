@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" placeholder="Module name" class="form-control"
                   name="name" value="{{ $name }}" required>
        </div>
        <div class="form-group">
            <label>Route :</label>
            <input type="text" placeholder="Route name" class="form-control"
                   name="route" value="{{ $route_name}}" required>
        </div>
        <div class="form-group">
            <label>Position:</label>
            <input type="text" placeholder="Position of module" class="form-control"
                   name="position" value="{{ $position }}" required>
        </div>
        <div class="form-group">
            <label>Icon:</label>
            <input type="text" placeholder="iconmoon icon" class="form-control"
                   name="icon" value="{{ $icon }}" required>
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
    <script>
        $(function() {
            $('.password-btn').on('click', function() {
                if($(this).text() === 'Reset Password'){
                    $(this).text('Keep Current Password');
                }else {
                    $(this).text('Reset Password');
                }
                if($('#password-box').is(':hidden')) {
                    $('#password-box').show();
                }else {
                    $('#password-box').hide();
                }
            });
        })
    </script>
@endpush
