@extends('layouts.master')
@section('style')
<style>
    *[data-href] {
  cursor: pointer;
}
td a {
  display:inline-block;
  min-height:100%;
  width:100%;
  padding: 10px; /* add your padding here */
}
td {
  padding:0;
}
</style>
@endsection
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('mails.home') ·</span>
            <strong>@lang('mails.hmail')</strong>
        </span>
    </nav>
    <div class="cui-utils-content">

        <!-- START: apps/mail -->
        <div class="card">
            <div class="card-body">
                <table class="table table-hover nowrap" id="example1">
                    <thead>
                        <tr>
                            <th class="width-150" width="20%">@lang('mails.to')</th>
                            <th  width="20%">@lang('mails.subject')</th>
                            <th class="no-sort width-10"  width="5%"></th>
                            <th class="no-sort width-50"  width="15%">@lang('mails.by')</th>
                            <th class="no-sort width-50"  width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($mails))
                        @foreach($mails as $mail)
                        <tr data-href="{{ url('mails/inbox/'.$mail->id) }}">
                            <td>{{ $mail->toemail }}</td>
                            <td>{{ $mail->title }}</td>
                            <td>@if($mail->attachment)<i class="icmn-attachment text-default"></i>@endif</td>
                            <td>{{ $mail->users->name }}</td>
                            <td>{{ $mail->created_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('mails.to')</th>
                            <th>@lang('mails.subject')</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- START: compose mail modal -->

    </div>
</div>
<!-- END: compose mail modal -->
<!-- END: apps/mail -->
<!-- START: page scripts -->
<script>

    ;
    $('*[data-href]').on("click",function(){
  window.location = $(this).data('href');
  return false;
});
$("td > a").on("click",function(e){
  e.stopPropagation();
})
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
                    "oPaginate" : {
                        "sFirst":    "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext":     "ถัดไป",
                        "sLast":     "หน้าสุดท้าย"
                    }
                }
                @endif
            })
        })
    })(jQuery)
</script>
@endsection
