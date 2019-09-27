@extends ('layouts.auth')

@section('content')
<div class="cui-layout-content">
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="{{ route('login') }}"><font color="black">@lang('login.login')</font></a></li>
                            <li class="ropdown-toggle text-nowrap list-inline-item" data-toggle="dropdown" aria-expanded="false"><a href="javascript: void(0);"><font color="black">@lang('login.language')</font></a></li>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('locale/th') }}"><font color="black">@lang('login.th')</font></a>
                                <a class="dropdown-item" href="{{ url('locale/en') }}"><font color="black">@lang('login.en')</font></a>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="cui-login-block">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cui-login-block-inner">
                        <div class="cui-login-block-form">
                            <h4 class="text-uppercase">
                                <strong>@lang('logs.reset')</strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">@lang('logs.email')</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" style="font-family: 'Pridi', serif;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary mr-5">@lang('logs.resetb')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
