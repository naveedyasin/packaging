@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>First name:</label>
            <input type="text" placeholder="First name" class="form-control"
                   name="first_name" value="{{ $first_name }}" required>
        </div>
        <div class="form-group">
            <label>Last name:</label>
            <input type="text" placeholder="Last name" class="form-control"
                   name="last_name" value="{{ $last_name}}" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" placeholder="example@yahoo.com" class="form-control"
                   name="email" value="{{ $email }}" required @isset($id) disabled @endisset>
        </div>
        @isset($id)
            <button type="button" class="btn btn-link password-btn mb-1">Reset Password</button>
        @endisset
        <div id="password-box" style="display: @isset($id) none @else block @endisset">
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" placeholder="Strong password"
                       name="password" id="password" required>
            </div>
            <div class="form-group">
                <label>Confirm password:</label>
                <input type="password" class="form-control" placeholder="Strong password"
                       name="repeat_password" id="repeat_password" required>
            </div>
        </div>
        <div class="form-group">
            <label class="d-block">Roles:</label>
            @if($roles->count())
                @foreach($roles as $role)
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-input-styled" name="roles[]"
                                   value="{{ $role->id }}"
                                   {{ is_array(old('roles')) ? (in_array($role->id, old('roles')) ? 'checked' : '') : (in_array($role->id, $userRoles) ? 'checked' : '') }} data-fouc>
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="form-group">
            <label>Permissions:</label>
            <select name="permissions[]" multiple="multiple"
                    class="form-control form-control-select2" data-placeholder="Select permissions"
                    data-fouc>
                @if($permissions)
                    @foreach($permissions as $perm)
                        <option
                            value="{{$perm->id}}" {{ is_array(old('permissions')) ? (in_array($perm->id, old('permissions')) ? 'selected' : '') : (in_array($perm->id, $userPermissions) ? 'selected' : '') }}>{{$perm->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label class="d-block">Status:</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-input-styled" name="is_active" value="1"
                           {{ $is_active ? 'checked' : '' }} data-fouc>
                    Active
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-input-styled" name="is_active" value="0"
                           {{ !$is_active ? 'checked' : '' }} data-fouc>
                    In-active
                </label>
            </div>
        </div>
        <div class="text-right">
            <a href="{{route('admin.user.index')}}" class="btn btn-default">Back</a>
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
