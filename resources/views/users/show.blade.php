@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('logs.description')</strong>
        </span>
        </nav>


        <div class="cui-utils-content">
            <!-- START: apps/profile -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="width-100 text-center pull-right hidden-md-down">
                                <h2><a class="btn btn-info btn-sm pull-right" href="{!! route('users.index') !!}"><i
                                            class="fa fa-arrow-left"></i>&nbsp;@lang('logs.back')</a></h2>
                            </div>
                            <h2>
                            <span class="text-black">
                                <strong>{{$user->name}}</strong>
                            </span>
                                <small class="text-muted">
                                    <?php
                                    $collection_role = $user->getRoleNames();
                                    $old_role = $collection_role->implode('-');

                                    $collection_permision = $user->getPermissionNames();
                                    $old_permission = $collection_permision->implode('-');
                                    ?>
                                    {{ strtoupper($old_role) }} [{{ $old_permission }}]
                                </small>
                            </h2>
                            <p class="mb-1">{{$user->email}}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 text-black">
                                <strong>@lang('logs.information')</strong>
                            </h5>
                            <dl class="row">
                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.phone')</dt>
                                <dd class="col-xl-3">
                                        <span class="badge badge-default">
                                          @if(isset($user->getprofiles->phone1))
                                                {!! $user->getprofiles->phone1 !!}
                                            @endif
                                        </span>
                                    <span class="badge badge-default">
                                          @if(isset($user->getprofiles->phone2))
                                            {!! $user->getprofiles->phone2 !!}
                                        @endif
                                        </span>
                                </dd>
                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.address')#1</dt>
                                <dd class="col-xl-3">
                                    @if(isset($user->getprofiles->address1))
                                        {{$user->getprofiles->address1}} {{$user->getprofiles->road1}} {{$user->getprofiles->subdistrict1}} {{$user->getprofiles->district1}} {{$user->getprofiles->province1}} {{$user->getprofiles->zipcode1}} @if($user->thai == 'N') ,{{$user->getprofiles->country}} @endif
                                    @endif
                                </dd>

                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.provider')</dt>
                                <dd class="col-xl-3">{{$user->typeuser}}</dd>

                                <dt class="col-xl-1"></dt>

                                <dt class="col-xl-2">@if($user->thai == 'Y') @lang('logs.address')#2 @endif</dt>
                                <dd class="col-xl-3">
                                    @if($user->thai == 'Y')
                                        @if(isset($user->getprofiles->address2))
                                            {{$user->getprofiles->address2}} {{$user->getprofiles->road2}} {{$user->getprofiles->subdistrict2}} {{$user->getprofiles->district2}} {{$user->getprofiles->province2}} {{$user->getprofiles->zipcode2}}
                                        @endif
                                    @endif
                                </dd>


                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.invite')</dt>
                                <dd class="col-xl-3">{{$user->invite}}</dd>

                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.register')</dt>
                                <dd class="col-xl-3">{{$user->register}}</dd>

                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.createat')</dt>
                                <dd class="col-xl-3">{{$user->created_at}}</dd>
                                <dt class="col-xl-1"></dt>
                                <dt class="col-xl-2">@lang('logs.updateat')</dt>
                                <dd class="col-xl-3">{{$user->updated_at}}</dd>

                            </dl>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover nowrap" id="example1">
                                <thead>
                                <tr>
                                    <th class="width-150" width="20%">@lang('mails.to')</th>
                                    <th width="20%">@lang('mails.subject')</th>
                                    <th width="20%">@lang('mails.description')</th>
                                    <th class="no-sort width-10" width="5%"></th>
                                    <th class="no-sort width-50" width="10%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($mails))
                                    @foreach($mails as $mail)
                                        <tr>
                                            <td>{{ $mail->toemail }}</td>
                                            <td>{{ $mail->title }}</td>
                                            <td>{{ $mail->remark }}</td>
                                            <td>@if($mail->attachment)<a
                                                    href="{{ url('/mails/getDownload/'.$mail->attachment) }}"><i
                                                        class="icmn-attachment text-default"></i></a>@endif</td>
                                            <td>{{ $mail->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>@lang('mails.to')</th>
                                    <th>@lang('mails.subject')</th>
                                    <th>@lang('mails.description')</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: apps/profile -->
        </div>
    </div>

    <script>
        ;
        $(function () {
            $('.select2').select2()
            $('.select2-tags').select2({
                tags: true,
            })

            $('.selectpicker').selectpicker()
        })
        ;
        (function ($) {
            'use strict'
            $(function () {
                ///////////////////////////////////////////////////
                // SIDEBAR CURRENT STATE
                $('.cui-apps-messaging-tab').on('click', function () {
                    $('.cui-apps-messaging-tab').removeClass('cui-apps-messaging-tab-selected')
                    $(this).addClass('cui-apps-messaging-tab-selected')
                })

                ///////////////////////////////////////////////////
                // TEXT EDITOR
                $(function () {
                    $('.summernote').summernote({
                        height: 200,
                    })
                })

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
            })
        })(jQuery)
    </script>
@endsection
