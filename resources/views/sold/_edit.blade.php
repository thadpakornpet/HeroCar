<form action="{{ url('/sold/soldedit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h4>แก้ไขประกาศขายรถ</h4>
        </div>
        <div class="modal-body">
            <fieldset class="border p-4">
                <legend class="w-auto">เกี่ยวกับรถ</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>ยี่ห้อ :</label>
                            <select class="form-control" name="makeid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($makes as $make)
                                    <option value="{{ $make->id }}" @if($sold->makeid == $make->id) selected @endif>{{ $make->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>รุ่นรถ :</label>
                            <select class="form-control" name="modelid" required style="font-family: 'Pridi', serif;" id="model">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($models as $model)
                                    <option value="{{ $model->id }}" @if($sold->modelid == $model->id) selected @endif>{{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ประเทศผลิต :</label>
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
                            <label>รูปแบบรถ :</label>
                            <select class="form-control" name="bodyid" required style="font-family: 'Pridi', serif;" id="bodytype">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($bodys as $body)
                                    <option value="{{ $body->id }}" @if($sold->bodyid == $body->id) selected @endif>{{ $body->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ระบบเกียร์ :</label>
                            <select class="form-control" name="tranid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($trans as $tran)
                                    <option value="{{ $tran->id }}" @if($sold->tranmisstionid == $tran->id) selected @endif>{{ $tran->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ขับเคลื่อน :</label>
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
                            <label>เครื่องยนต์ :</label>
                            <select class="form-control" name="engineid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($engines as $engine)
                                    <option value="{{ $engine->id }}" @if($sold->enginetypeid == $engine->id) selected @endif>{{ $engine->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>เชื้อเพลิง :</label>
                            <select class="form-control" name="fuelid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($fuels as $fuel)
                                    <option value="{{ $fuel->id }}" @if($sold->fueltype == $fuel->id) selected @endif>{{ $fuel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>สี :</label>
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
                            <label>ทะเบียนรถ :</label>
                            <input type="text" class="form-control" name="licenseno" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->licenseno }}">
                        </div>
                        <div class="col-md-3">
                            <label>ปีรถ :</label>
                            <input type="text" class="form-control" name="year" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->year }}">
                        </div>
                        <div class="col-md-3">
                            <label>ระยะไมล์ :</label>
                            <input type="text" class="form-control" name="mile" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->miles }}">
                        </div>
                        <div class="col-md-3">
                            <label>ราคา :</label>
                            <input type="text" class="form-control" name="price" required
                                   style="font-family: 'Pridi', serif;" value="{{ $sold->price }}">
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">รูปภาพของรถ</legend>
                <div class="form-group">
                    <div class="col-md-12">
                        @if(isset($imgs))
                            <font color="red">ลบคลิปที่รูป &nbsp;</font>
                        @foreach($imgs as $img)
                                <img id="targetPhoto" src="{{ asset('imgcar/'.$img->image) }}"
                                     alt="" width="120" height="120" onclick="img({{ $img->id }});"/>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div id="image_preview"></div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">เสริม</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="feature" placeholder="กรุณาระบุอุปกรณ์เสริม (หากมี)" class="form-control"
                                      rows="5">@if(isset($fea)){{ $fea->name }}@endif</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">Note</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="note" placeholder="บันทึกข้อมูลเกี่ยวกับรายละเอียดของรถที่คุณต้องการบอกผู้ซื้อ" class="form-control"
                                      rows="5" >{{ $sold->soldnote }}</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="{{ $sold->id }}">
            <button type="submit" class="btn width-200 btn-primary" id="submit-all">
                <i class="fa fa-send mr-2"></i> แก้ไขประกาศขายรถ
            </button>
        </div>
    </div>
</form>
@section('script')
<script>
    function preview_image()
    {
        var total_file=document.getElementById("upload_file").files.length;
        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='150' height='150'>");
        }
    }

    function img(img) {
        swal(
            {
                title: 'คุณต้องการลบ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'ยืนยันการลบ',
                cancelButtonText: 'ยกเลิก',
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
                                title: 'ลบเรียบร้อยแล้ว!',
                                type: 'success',
                                confirmButtonClass: 'btn-success',
                            });
                            window.location.reload();
                        },
                        error: function () {
                            swal({
                                title: 'เกิดข้อผิดพลาด ไม่อนุญาตทำรายการ',
                                type: 'error',
                                confirmButtonClass: 'btn-danger',
                            })
                        }
                    })
                } else {
                    swal({
                        title: 'การลบล้มเหลว',
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    })
                }
            },
        )
    }
</script>
@endsection
