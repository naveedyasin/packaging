@if (session('message'))
    <div class="alert alert-{{ Session::get('status') }} alert-styled-left alert-arrow-left alert-dismissible"
         role="alert">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {{ session('message') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <h5><i class="icon fa fa-check fa-fw" aria-hidden="true"></i> Success</h5>
        {{ session('success') }}
    </div>
@endif

@if(session()->has('status'))
    @if(session()->get('status') == 'wrong')
        <div class="alert alert-danger alert-styled-left alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{ session('message') }}
        </div>
    @endif
@endif

@if (session('error'))
    <div class="alert alert-danger alert-styled-left alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <h5>
            <i class="icon fa fa-warning fa-fw" aria-hidden="true"></i>
            Error
        </h5>
        {{ session('error') }}
    </div>
@endif

@if (session('errors') && count($errors) > 0)
    <div class="alert alert-danger alert-styled-left alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <h5>
            <i class="icon fa fa-warning fa-fw" aria-hidden="true"></i>
            <strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}
        </h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
