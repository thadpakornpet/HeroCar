@extends ('layouts.auth')

@section('content')
<div class="cui-layout-content">
        <div class="cui-login-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cui-login-header-menu">
                        <ul class="list-unstyled list-inline">
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('locale/th') }}">@lang('login.th')</a>
                                <a class="dropdown-item" href="{{ url('locale/en') }}">@lang('login.en')</a>
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
                                <strong>
                                    @if(app()->getLocale() == 'th')
                                    ลงทะเบียนโดยการเชิญชวน
                                    @else
                                    Register by invited
                                    @endif
                                </strong>
                            </h4>
                            <br />
                            <form id="form-validation" name="form-validation" method="POST" action="{{ url('registerinvate') }}">
                                @csrf
                                <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">@lang('logs.name')</label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="Email" class="col-md-4 control-label">@lang('logs.email') </label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email" value="{{ $user->email }}" required>

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">@lang('logs.password')</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">

                                            <label for="password-confirm" class="col-md-4 control-label">@lang('logs.cpassword')</label>

                                            <div class="col-md-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>


                                <input type="hidden" name="token" value="{{ $user->password }}">

                                    <div class="form-group row pull-right">
                                            <button type="submit" class="btn btn-primary">@lang('logs.signup')</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function () {
    $('#subdistrict1').change(function() {
        $('#zipcode1').val($(this).find(':selected').data('zip'));
});

$('#province1').change(function() {
    $.ajax({
       method: "GET",
       url: "{{route('get_amphures')}}",
       data: {
        province: $("#province1").val(),
              },
       success: function(data) {
        $('#district1').find('option').remove()
           console.log(data);
        data.forEach(function(element) {
            $('#district1').append(
                "<option value='"+element.name_th+"'>"+element.name_th+"</option>"
            )
});
       }
   });
});
$('#district1').change(function() {
    $.ajax({
       method: "GET",
       url: "{{route('get_dis')}}",
       data: {
        district: $("#district1").val(),
              },
       success: function(data) {
           console.log(data);
           $('#subdistrict1').find('option').remove()
        data.forEach(function(element) {
            $('#subdistrict1').append(
                "<option  data-zip='"+element.zip_code+"' value='"+element.name_th+"'>"+element.name_th+"</option>"
            )
});
       }
   });
});


});


</script>
@endsection
