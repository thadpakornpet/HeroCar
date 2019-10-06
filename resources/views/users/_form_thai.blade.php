<?php
$name = !empty($user->id) ? old('name', $user->name) : old('name', '');
$email = !empty($user->id) ? old('email', $user->email) : old('email', '');
if(isset($user->getprofiles->phone1)){
  $phone1 = $user->getprofiles->phone1;
} else {
  $phone1 = '';
}
if(isset($user->getprofiles->phone2)){
  $phone2 = $user->getprofiles->phone2;
} else {
  $phone2 = '';
}
if(isset($user->getprofiles->address1)){
  $address1 = $user->getprofiles->address1;
} else {
  $address1 = '';
}
if(isset($user->getprofiles->address2)){
  $address2 = $user->getprofiles->address2;
} else {
  $address2 = '';
}
if(isset($user->getprofiles->road1)){
  $road1 = $user->getprofiles->road1;
} else {
  $road1 = '';
}
if(isset($user->getprofiles->subdistrict1)){
  $subdistrict1 = $user->getprofiles->subdistrict1;
} else {
  $subdistrict1 = '';
}
if(isset($user->getprofiles->district1)){
  $district1 = $user->getprofiles->district1;
} else {
  $district1 = '';
}
if(isset($user->getprofiles->province1)){
  $province1 = $user->getprofiles->province1;
} else {
  $province1 = '';
}
if(isset($user->getprofiles->zipcode1)){
  $zipcode1 = $user->getprofiles->zipcode1;
} else {
  $zipcode1 = '';
}

if(isset($user->getprofiles->road2)){
  $road2 = $user->getprofiles->road2;
} else {
  $road2 = '';
}
if(isset($user->getprofiles->subdistrict2)){
  $subdistrict2 = $user->getprofiles->subdistrict2;
} else {
  $subdistrict2 = '';
}
if(isset($user->getprofiles->district2)){
  $district2 = $user->getprofiles->district2;
} else {
  $district2 = '';
}
if(isset($user->getprofiles->province2)){
  $province2 = $user->getprofiles->province2;
} else {
  $province2 = '';
}
if(isset($user->getprofiles->zipcode2)){
  $zipcode2 = $user->getprofiles->zipcode2;
} else {
  $zipcode2 = '';
}
//$phone1 = !empty($user->id) ? old('phone1', $user->getprofiles->phone1) : old('phone1', '');
//$phone2 = !empty($user->id) ? old('phone2', $user->getprofiles->phone2) : old('phone2', '');
// $address1 = !empty($user->id) ? old('address1', $user->getprofiles->address1) : old('address1', '');
//
// $road1 = !empty($user->id) ? old('road', $user->getprofiles->road1) : old('road1', '');
// $subdistrict1 = !empty($user->id) ? old('subdistrict1', $user->getprofiles->subdistrict1) : old('subdistrict1', '');
// $district1 = !empty($user->id) ? old('district1', $user->getprofiles->district1) : old('district1', '');
// $province1 = !empty($user->id) ? old('province1', $user->getprofiles->province1) : old('province1', '');
// $zipcode1 = !empty($user->id) ? old('zipcode1', $user->getprofiles->zipcode1) : old('zipcode1', '');
//
//
// $address2 = !empty($user->id) ? old('address2', $user->getprofiles->address2) : old('address2', '');
// $road2 = !empty($user->id) ? old('road', $user->getprofiles->road2) : old('road2', '');
// $subdistrict2 = !empty($user->id) ? old('subdistrict2', $user->getprofiles->subdistrict2) : old('subdistrict2', '');
// $district2 = !empty($user->id) ? old('district2', $user->getprofiles->district1) : old('district2', '');
// $province2 = !empty($user->id) ? old('province2', $user->getprofiles->province2) : old('province2', '');
// $zipcode2 = !empty($user->id) ? old('zipcode2', $user->getprofiles->zipcode2) : old('zipcode2', '');
?>
@if(!empty($user->id))
<form action="{{ route( 'users.update',$user) }}" method="post" class="form-horizontal">
    {{ method_field('PUT') }}
    @else
    <form action="{!! route('users.store') !!}" method="post" class="form-horizontal">
        @endif
        {!! csrf_field() !!}

        <div class="form-group row">
            <label class="col-md-1 col-form-label text-required">@lang('logs.email') : </label>
            <div class="col-sm-5">
                <input type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email" value="{!! $email !!}">
            </div>

            <label class="col-md-1 col-form-label text-required">@lang('logs.name') : </label>
            <div class="col-sm-5">
                <input type="text"  style="font-family: 'Pridi', serif;"class="form-control" name="name" value="{!! $name !!}">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <br/>
                <h3>@lang('logs.addressuser')</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-required">@lang('logs.phone') : </label>
                            <div class="col-sm-10">
                                <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="phone1" value="{!! $phone1 !!}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label text-required">@lang('logs.address') : </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="font-family: 'Pridi', serif;" name="address1" rows="3">{!! $address1 !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label text-required">@lang('logs.road') : </label>
                            <div class="col-sm-10">
                                <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="road1" value="{!! $road1 !!}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.pro') : </label>
                            <div class="col-sm-10">
                                <select class="form-control" style="font-family: 'Pridi', serif;" required id="province1" name="province1">
                                    <option value="" disabled selected>--@lang('logs.select')--</option>
                                    @foreach($provinces as $key => $value)
                                    <option  value="{!! $value->name_th !!}"  @if($province1 != ''){!! $user->getprofiles->province1 == $value->name_th ? 'selected' : '' !!}@endif>{!! $value->name_th !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.dis') : </label>
                            <div class="col-sm-10">
                                <select class="form-control" style="font-family: 'Pridi', serif;" required id="district1" name="district1">
                                    @if($district1 == null)
                                    <option value="" disabled selected>--@lang('logs.select')--</option>
                                    @else
                                    <option value="{!! $district1 !!}" selected>{!! $district1 !!}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.subdis') : </label>
                            <div class="col-sm-10">
                                <select class="form-control" style="font-family: 'Pridi', serif;" required id="subdistrict1" name="subdistrict1">
                                    @if($subdistrict1 == null)
                                    <option value="" disabled selected>--@lang('logs.select')--</option>
                                    @else
                                    <option  value="{!! $subdistrict1 !!}" selected>{!! $subdistrict1 !!}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.zip') : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" required id="zipcode1" name="zipcode1" value="{!! $zipcode1 !!}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <br/>
                <h3>@lang('logs.addresspresent')</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.phone') : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" name="phone2" value="{!! $phone2 !!}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="10" class="control-label col-md-2 text-required">@lang('logs.address') : </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="font-family: 'Pridi', serif;" name="address2" rows="3">{!! $address2 !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.road') : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" name="road2" value="{!! $road2 !!}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.pro') : </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="province2" style="font-family: 'Pridi', serif;" name="province2">
                                    <option value="" disabled selected>--@lang('logs.select')--</option>
                                    @foreach($provinces as $key => $value)
                                    <option  value="{!! $value->name_th !!}" @if($province2 != ''){!! $user->getprofiles->province2 == $value->name_th ? 'selected' : '' !!}@endif>{!! $value->name_th !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.dis') : </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="district2" style="font-family: 'Pridi', serif;" name="district2">
                                    @if($district2 == null)
                                    <option value="" disabled selected>--@lang('logs.select')--</option>
                                    @else
                                    <option value="{!! $district2 !!}" selected>{!! $district2 !!}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.subdis') : </label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="subdistrict2" style="font-family: 'Pridi', serif;" name="subdistrict2">
                                    @if($subdistrict2 == null)
                                    <option value="" disabled selected>--@lang('logs.select')--</option>
                                    @else
                                    <option  value="{!! $subdistrict2 !!}" selected>{!! $subdistrict2 !!}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.zip') : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style="font-family: 'Pridi', serif;" required name="zipcode2" id="zipcode2" value="{!! $zipcode2 !!}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($user->id))
        <input type="hidden" name="id" value="{!! $user->id !!}">
        @endif

        <div class="form-group">
            <div class="pull-right">
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;@lang('logs.cancle')</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('logs.save')</button>
            </div>
        </div>

    </form>

    <script>

        $(document).ready(function () {
            $('#subdistrict1').change(function () {
                $('#zipcode1').val($(this).find(':selected').data('zip'));
            });
            $('#subdistrict2').change(function () {
                $('#zipcode2').val($(this).find(':selected').data('zip'));
            });
            $('#province1').change(function () {
                $.ajax({
                    method: "GET",
                    url: "{{route('get_amphures')}}",
                    data: {
                        province: $("#province1").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#district1').append(
                                    "<option value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });
            $('#province2').change(function () {
                $.ajax({
                    method: "GET",
                    url: "{{route('get_amphures')}}",
                    data: {
                        province: $("#province2").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#district2').append(
                                    "<option value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });
            $('#district1').change(function () {
                $.ajax({
                    method: "GET",
                    url: "{{route('get_dis')}}",
                    data: {
                        district: $("#district1").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#subdistrict1').append(
                                    "<option  data-zip='" + element.zip_code + "' value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });
            $('#district2').change(function () {
                $.ajax({
                    method: "GET",
                    url: "{{route('get_dis')}}",
                    data: {
                        district: $("#district2").val(),
                    },
                    success: function (data) {
                        console.log(data);
                        data.forEach(function (element) {
                            $('#subdistrict2').append(
                                    "<option  data-zip='" + element.zip_code + "' value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                        });
                    }
                });
            });

        });


    </script>
