<form action="{{ url('/sold') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h4>ประกาศขายรถ</h4>
        </div>
        <div class="modal-body">
            <fieldset class="border p-4">
                <legend class="w-auto">เกี่ยวกับรถ</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>ยี่ห้อ :</label>
                            <select class="form-control" name="makeid" required style="font-family: 'Pridi', serif;" onchange="infomodel(this.value);">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($makes as $make)
                                    <option value="{{ $make->id }},{{ $make->country_id }}">{{ $make->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>รุ่นรถ :</label>
                            <select class="form-control" name="modelid" required style="font-family: 'Pridi', serif;" id="model" onblur="infobodytype(this.value);">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ประเทศผลิต :</label>
                            <select class="form-control" name="countryid" required style="font-family: 'Pridi', serif;" id="country">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
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
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ระบบเกียร์ :</label>
                            <select class="form-control" name="tranid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($trans as $tran)
                                    <option value="{{ $tran->id }}">{{ $tran->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ขับเคลื่อน :</label>
                            <select class="form-control" name="driveid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($drives as $drive)
                                    <option value="{{ $drive->id }}">{{ $drive->name }}</option>
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
                                    <option value="{{ $engine->id }}">{{ $engine->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>เชื้อเพลิง :</label>
                            <select class="form-control" name="fuelid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($fuels as $fuel)
                                    <option value="{{ $fuel->id }}">{{ $fuel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>สี :</label>
                            <select class="form-control" name="colorid" required style="font-family: 'Pridi', serif;">
                                <option value="" disabled selected>--@lang('logs.select')--</option>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
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
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label>ปีรถ :</label>
                            <input type="text" class="form-control" name="year" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label>ระยะไมล์ :</label>
                            <input type="text" class="form-control" name="mile" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                        <div class="col-md-3">
                            <label>ราคา :</label>
                            <input type="text" class="form-control" name="price" required
                                   style="font-family: 'Pridi', serif;">
                        </div>
                    </div>
                </div>
            </fieldset>

            <br/>
            <fieldset class="border p-4">
                <legend class="w-auto">รูปภาพของรถ</legend>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple required/>
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
                                      rows="5"></textarea>
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
                                      rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn width-200 btn-primary" id="submit-all">
                <i class="fa fa-send mr-2"></i> ลงทะเบียนประกาศ
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function infomodel(data) {
        var data = data.split(',');
        $.ajax({
            url: "{{ url('infosold/model') }}",
            data: {id:data[0],country:data[1]},
            type: 'POST',
            success: function(data) {
                data['models'].forEach(function (element) {
                    $('#model').html(
                        "<option value='" + element.id + ","+ element.bodytype +"'>" + element.name + "</option>"
                    )
                });
                data['countrys'].forEach(function (element) {
                    $('#country').html(
                        "<option value='" + element.id + "'>" + element.name + "</option>"
                    )
                });
            },
            error: function (e) {
                console.log(e)
            }
        })
    }

    function infobodytype(data) {
        var data = data.split(',');
        $.ajax({
            url: "{{ url('infosold/bodytype') }}",
            data: {id:data[1]},
            type: 'POST',
            success: function(data) {
                data['bodytypes'].forEach(function (element) {
                    $('#bodytype').html(
                        "<option value='" + element.id + "'>" + element.name + "</option>"
                    )
                });
            },
            error: function (e) {
                console.log(e)
            }
        })
    }
</script>
@endsection
