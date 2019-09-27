@extends ('layouts.auth')

@section('content')
<div class="cui-layout-content">
    <div class="cui-login">
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#exampleModal"><font color="black">@lang('login.register')</font></a></li>
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
                                <strong>@lang('login.pleaselogin')</strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">@lang('login.username')</label>
                                    <input
                                        id="validation-email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="@lang('login.username')"
                                        name="email" value="{{ old('email') }}"
                                        type="text"
                                        autofocus style="font-family: 'Pridi', serif;"
                                        />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('login.password')</label>
                                    <input
                                        id="validation-password"
                                        class="form-control password @error('password') is-invalid @enderror"
                                        name="password"
                                        type="password"
                                        placeholder="@lang('login.password')" style="font-family: 'Pridi', serif;"
                                        />
                                </div>
                                <div class="form-group">
                                    <a
                                        href="{{ route('password.request') }}"
                                        class="pull-right cui-utils-link-blue cui-utils-link-underlined"
                                        >@lang('login.forget')</a
                                    >
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                                   @lang('login.remember')
                                        </label>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary mr-5">@lang('login.signin')</button>
                                </div>
                                <div class="form-group">
                                    <span>
                                        @lang('login.use')
                                    </span>
                                    <div class="mt-2">
                                        <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-icon">
                                            <i class="icmn-facebook"></i>
                                        </a>
                                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-icon">
                                            <i class="icmn-google"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form-validation" name="form-validation" method="POST" action="{{ route('register') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>@lang('logs.pleaseregister')</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">@lang('logs.name')</label>

                                <div class="col-md-10">
                                    <input id="name" type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="Email" class="col-md-2 control-label">@lang('logs.email') </label>

                                <div class="col-md-10">
                                    <input id="email" type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-2 control-label">@lang('logs.password')</label>

                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-2 control-label">@lang('logs.cpassword')</label>

                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">@lang('logs.signup')</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
