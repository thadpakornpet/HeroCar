@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('sold.home')</strong>
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
                                        <th>@lang('sold.id')</th>
                                        <th>@lang('sold.license')</th>
                                        <th>@lang('sold.make')</th>
                                        <th>@lang('sold.model')</th>
                                        <th>@lang('sold.body')</th>
                                        <th>@lang('sold.country')</th>
                                        <th>@lang('sold.price')</th>
                                        <th>@lang('sold.status')</th>
                                        <th>@lang('sold.create')</th>
                                        <th>@lang('sold.update')</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($solds))
                                        @foreach($solds as $sold)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-sm btn-rounded btn-outline-primary" onclick="getinfo({{ $sold->id }})";>
                                                        @lang('sold.detail')
                                                    </button>
                                                </td>
                                                <td>{{ $sold->id }}</td>
                                                <td>{{ $sold->licenseno }}</td>
                                                <td>{{ $sold->getNameMake->name }}</td>
                                                <td>{{ $sold->getNameModel->name }}</td>
                                                <td>{{ $sold->getNameBodyType->name }}</td>
                                                <td>@if(str_replace('_', '-', app()->getLocale()) == "th") {{ $sold->getNameCountry->name }} @else {{ $sold->getNameCountry->name_short }} @endif</td>
                                                <td>{{ number_format($sold->price) }}</td>
                                                <td>
                                                    @if($sold->status == 0)
                                                        <button class="btn btn-warning btn-sm" style="width: 70px">Pending</button>
                                                    @endif
                                                    @if($sold->status == 1)
                                                        <button class="btn btn-success btn-sm" style="width: 70px">Active</button>
                                                    @endif
                                                    @if($sold->status == 2)
                                                        <button class="btn btn-primary btn-sm" style="width: 70px">Sold</button>
                                                    @endif
                                                    @if($sold->status == 3)
                                                        <button class="btn btn-secondary btn-sm" style="width: 70px">Cancel</button>
                                                    @endif
                                                        @if($sold->status == 4)
                                                            <button class="btn btn-danger btn-sm" style="width: 70px">Reject</button>
                                                        @endif
                                                </td>
                                                <td>{{ $sold->created_at }}</td>
                                                <td>{{ $sold->updated_at }}</td>
                                                <td>
                                                    @role('owner')
                                                    @if($sold->status == 0 || $sold->status == 1)
                                                        <button class="btn btn-rounded btn-sm btn-outline-secondary" onclick="soldedit({{ $sold->id }});">
                                                            @lang('sold.edit')
                                                        </button>
                                                        <button class="btn btn-rounded btn-sm btn-outline-danger"
                                                                onclick="solddelete({{ $sold->id }});">@lang('sold.delete')
                                                        </button>
                                                    @endif
                                                    @endrole
                                                    @role('super')
                                                    <button class="btn btn-rounded btn-sm btn-outline-success" onclick="approve({{ $sold->id }},1);">
                                                        @lang('sold.approve')
                                                    </button>
                                                    <button class="btn btn-rounded btn-sm btn-outline-warning" onclick="approve({{ $sold->id }},4);">
                                                        @lang('sold.inapprove')
                                                    </button>
                                                    <button class="btn btn-rounded btn-sm btn-outline-danger"
                                                            onclick="solddelete({{ $sold->id }});">@lang('sold.delete')
                                                    </button>
                                                    @endrole
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
        ;
        @if(Auth::user()->hasRole('super'))
        function approve(a,b) {
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
                            url: "{{ url('sold/approve') }}",
                            data: {a: a,b:b},
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
                            title: '@lang("sold.error")',
                            type: 'error',
                            confirmButtonClass: 'btn-danger',
                        })
                    }
                },
            )
        }
        @endif
        ;
        function soldedit(id) {
            if(id){
                window.location = "{{ url('sold/edit') }}" + '/' +id;
            } else {
                swal({
                    title: '@lang("sold.not")',
                    type: 'error',
                    confirmButtonClass: 'btn-danger',
                });
            }
        }
        ;
        function getinfo(id) {
            if(id){
                @if(Auth::user()->hasRole('super'))
                window.open("{{ url('sold/detail') }}" + '/' +id, '_blank');
                @else
                window.location = "{{ url('sold/detail') }}" + '/' +id;
                @endif
            } else {
                swal({
                    title: '@lang("sold.not")',
                    type: 'error',
                    confirmButtonClass: 'btn-danger',
                });
            }
        }
        ;
        function solddelete(id) {
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
                            url: "{{ url('sold/delete') }}",
                            data: {id: id},
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
