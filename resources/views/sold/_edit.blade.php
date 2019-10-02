@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection
<form action="{{ url('/sold/soldedit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h4>@lang('sold.edit')</h4>
        </div>
        <div class="modal-body">
            <fieldset class="border p-4">
                <legend class="w-auto">@lang('sold.about')</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>@lang('sold.make') :</label>
                            <select class="form-control" name="makeid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($makes as $make)
                                    <option value="{{ $make->id }}" @if($sold->makeid == $make->id) selected @endif>{{ $make->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>@lang('sold.model') :</label>
                            <select class="form-control" name="modelid" required style="font-family: 'Pridi', serif;" id="model">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($models as $model)
                                    <option value="{{ $model->id }}" @if($sold->modelid == $model->id) selected @endif>{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>@lang('sold.country') :</label>
                            <select class="form-control" name="countryid" required style="font-family: 'Pridi', serif;" id="country">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($countrys as $country)
                                    <option value="{{ $country->id }}" @if($sold->countryid == $country->id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>@lang('sold.body') :</label>
                            <select class="form-control" name="bodyid" required style="font-family: 'Pridi', serif;" id="bodytype">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($bodys as $body)
                                    <option value="{{ $body->id }}" @if($sold->bodyid == $body->id) selected @endif>{{ $body->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>@lang('sold.tran') :</label>
                            <select class="form-control" name="tranid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($trans as $tran)
                                    <option value="{{ $tran->id }}" @if($sold->tranmisstionid == $tran->id) selected @endif>{{ $tran->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>@lang('sold.drive') :</label>
                            <select class="form-control" name="driveid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($drives as $drive)
                                    <option value="{{ $drive->id }}" @if($sold->drivetypeid == $drive->id) selected @endif>{{ $drive->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>@lang('sold.engine') :</label>
                            <select class="form-control" name="engineid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($engines as $engine)
                                    <option value="{{ $engine->id }}" @if($sold->enginetypeid == $engine->id) selected @endif>{{ $engine->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>@lang('sold.fuel') :</label>
                            <select class="form-control" name="fuelid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($fuels as $fuel)
                                    <option value="{{ $fuel->id }}" @if($sold->fueltype == $fuel->id) selected @endif>{{ $fuel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>@lang('sold.color') :</label>
                            <select class="form-control" name="colorid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @if($sold->colorid == $color->id) selected @endif>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>@lang('sold.license') :</label>
                            <input type="text" class="form-control" name="licenseno" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->licenseno }}">
                        </div>
                        <div class="col-md-3">
                            <label>@lang('sold.year') :</label>
                            <input type="text" class="form-control" name="year" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->year }}">
                        </div>
                        <div class="col-md-3">
                            <label>@lang('sold.mile') :</label>
                            <input type="text" class="form-control" name="mile" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->miles }}">
                        </div>
                        <div class="col-md-3">
                            <label>@lang('sold.price') :</label>
                            <input type="text" class="form-control" name="price" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->price }}">
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">@lang('sold.img')</legend>
                <div class="form-group">
                    <div class="col-md-12">
                        @if(isset($imgs))
                            <font color="red">@lang('sold.deleteimg') &nbsp;</font>
                        @foreach($imgs as $img)
                                <img id="targetPhoto" src="{{ asset('imgcar/'.$img->image) }}"
                                     alt="" width="120" height="120" onclick="img({{ $img->id }});"/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </fieldset>
            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">@lang('sold.feature')</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="feature" placeholder="กรุณาระบุอุปกรณ์เสริม (หากมี)" class="form-control"
                                      rows="5" style="font-family: 'Pridi', serif;">@if(isset($fea)){{ $fea->name }}@endif</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">@lang('sold.note')</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="note" placeholder="บันทึกข้อมูลเกี่ยวกับรายละเอียดของรถที่คุณต้องการบอกผู้ซื้อ" class="form-control"
                                      rows="5" style="font-family: 'Pridi', serif;">{{ $sold->soldnote }}</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="{{ $sold->id }}">
            <button type="submit" class="btn width-200 btn-primary" id="submit-all">
                <i class="fa fa-send mr-2"></i> @lang('sold.edit')
            </button>
        </div>
    </div>
</form>
<div class="modal-content">
    <div class="modal-body">
        <legend class="w-auto">@lang('sold.img')</legend>
        <form method="post" action="{{url('sold/image')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
            @csrf
            <input type="hidden" name="id" value="{{ $sold->id }}">
        </form>
    </div>
</div>
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("sold/image/delete") }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
    </script>
<script>
    function img(img) {
        swal(
            {
                title: '@lang("sold.continue")?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: '@lang("sold.confirm")',
                cancelButtonText: '@lang("sold.cancel")',
                closeOnConfirm: false,
                closeOnCancel: false,
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('sold/deleteimg') }}",
                        data: {id: img},
                        type: 'POST',
                        success: function () {
                            swal({
                                title: '@lang("sold.success")!',
                                type: 'success',
                                confirmButtonClass: 'btn-success',
                            });
                            window.location.reload();
                        },
                        error: function () {
                            swal({
                                title: '@lang("sold.error")',
                                type: 'error',
                                confirmButtonClass: 'btn-danger',
                            })
                        }
                    })
                } else {
                    swal({
                        title: '@lang("sold.not")',
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    })
                }
            },
        )
    }
</script>
@endsection
