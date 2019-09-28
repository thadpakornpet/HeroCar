@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>รายการรถที่ประกาศขาย</strong>
        </span>
        </nav>

        <div class="cui-utils-content">
            <!-- START: tables/basic-tables -->
            <section class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5">
                                <table class="table table-responsive-xl" id="example1">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>เลขที่ประกาศ</th>
                                        <th>ทะเบียน</th>
                                        <th>ยี่ห้อ</th>
                                        <th>รุ่น</th>
                                        <th>รูปแบบ</th>
                                        <th>ประเทศ</th>
                                        <th>ราคา</th>
                                        <th>สถานะ</th>
                                        <th>ประกาศเมื่อ</th>
                                        <th>ปรับปรุงเมื่อ</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($solds))
                                        @foreach($solds as $sold)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-sm btn-rounded btn-outline-primary">
                                                        รายละเอียด
                                                    </button>
                                                </td>
                                                <td>{{ $sold->id }}</td>
                                                <td>{{ $sold->licenseno }}</td>
                                                <td>{{ $sold->getNameMake->name }}</td>
                                                <td>{{ $sold->getNameModel->name }}</td>
                                                <td>{{ $sold->getNameBodyType->name }}</td>
                                                <td>{{ $sold->getNameCountry->name }}</td>
                                                <td>{{ number_format($sold->price) }}</td>
                                                <td>
                                                    @if($sold->status == 0)
                                                        <button class="btn btn-warning btn-sm">Pending</button>
                                                    @endif
                                                    @if($sold->status == 1)
                                                        <button class="btn btn-success btn-sm">Active</button>
                                                    @endif
                                                    @if($sold->status == 2)
                                                        <button class="btn btn-primary btn-sm">Sold</button>
                                                    @endif
                                                    @if($sold->status == 3)
                                                        <button class="btn btn-danger btn-sm">Cancel</button>
                                                    @endif
                                                </td>
                                                <td>{{ $sold->created_at }}</td>
                                                <td>{{ $sold->updated_at }}</td>
                                                <td>
                                                    @if($sold->status == 0 || $sold->status == 1)
                                                        <button class="btn btn-rounded btn-sm btn-outline-secondary">
                                                            แก้ไข
                                                        </button>
                                                        <button class="btn btn-rounded btn-sm btn-outline-danger"
                                                                onclick="solddelete({{ $sold->id }});">ลบ
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function solddelete(id) {
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
                            url: "{{ url('sold/delete') }}",
                            data: {id: id},
                            type: 'POST',
                            success: function () {
                                swal({
                                    title: 'ลบเรียบร้อยแล้ว!',
                                    type: 'success',
                                    confirmButtonClass: 'btn-success',
                                });
                                window.location.reload();
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
        ;
        ///////////////////////////////////////////////////
        // DATATABLES
        $('#example1').DataTable({
            responsive: true,
            order: [],
            columnDefs: [
                {
                    targets: 'no-sort',
                    orderable: false,
                },
            ],
            lengthMenu: [[20, 50, 100, -1], [20, 50, 100, '@if(str_replace('_', '-', app()->getLocale()) == "th") ทั้งหมด @else All @endif']],
            @if(str_replace('_', '-', app()->getLocale()) == "th")
            oLanguage: {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "sSearch": "ค้นหา :",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                }
            }
            @endif
        })
    </script>
@endsection
