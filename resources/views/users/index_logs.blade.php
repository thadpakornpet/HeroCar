@extends('layouts.master')
@if(Auth::user()->typeofuser != 6)
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('logs.logs')</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        @if(count($users1)>0)
                        @lang('logs.list')
                        {{($users1->currentPage() - 1) * 20 + 1 }} -
                        {{min( $users1->total(), $users1->currentPage() * 20)}}
                        @lang('logs.from')
                        {{$users1->total()}}
                        @else
                        @lang('logs.listofuser')
                        @endif
                    </strong>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            @lang('logs.userid')
                                        </th>
                                        <th>
                                            @lang('logs.remark')
                                        </th>
                                        <th>
                                            @lang('logs.ipaddress')
                                        </th>
                                        <th>
                                            @lang('logs.agent')
                                        </th>
                                        <th>
                                            @lang('logs.createat')
                                        </th><th>
                                            @lang('logs.updateat')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users1 as $user1)
                                    <tr>
                                        <td>
                                            {{$user1->user->name}}
                                        </td>
                                        <td>
                                            {!! $user1->remark !!}
                                        </td>
                                        <td>
                                            {!! $user1->ipaddress !!}
                                        </td>
                                        <td>
                                            {{$user1->agen['name']}}
                                        </td>
                                        <td>
                                            {!! $user1->created_at !!}
                                        </td>
                                        <td>
                                            {!! $user1->updated_at !!}
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            @lang('logs.empty')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        {{ $users1->render() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function deleteRow(id) {
        var r = confirm("คุณค้องการลบข้อมูล ?");
        if (r) {
            $("#formDelete" + id).submit();
        }
    }
</script>
@endsection
@else
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">หน้าแรก ·</span>
            <strong>รายการผู้ใช้งาน</strong>
        </span>
    </nav>


    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        Your User!!
                    </strong>
                </span>
            </div>
        </section>
    </div>
</div>
@endsection
@endif
