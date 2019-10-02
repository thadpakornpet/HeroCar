@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('tables.fuel')</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        @if(count($users)>0)
                            @lang('logs.list')
                        {{($users->currentPage() - 1) * 20 + 1 }} -
                        {{min( $users->total(), $users->currentPage() * 20)}}
                            @lang('logs.from')
                        {{$users->total()}}
                        @else
                            @lang('logs.listofuser')
                        @endif
                    </strong>
                </span>

                @role('super')
                <a href="" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#createbody">&nbsp;@lang('tables.create')</a>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            @lang('tables.name')
                                        </th>
                                        @role('super')
                                        <th class="text-center">
                                            @lang('tables.manage')
                                        </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td class="text-center">
                                            @role('super')
                                            <a title="แก้ไข" href="{{ url('tables/fuel/'.$user->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                            <a title="ลบ" onclick="deleteRow('{!! $user->id !!}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @endrole
                                        <form method="POST" class="hidden" id="formDelete{!! $user->id !!}" action="{{ url('tables/fuel/delete') }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" value="{{ $user->id }}" name="id">
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            @lang('tables.empty')
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
                        {{ $users->render() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade modal-size-large" id="createbody" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<form action="{{ url('fuel/create') }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4>@lang('tables.add')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อรูปแบบ" name="name" required/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn width-200 btn-primary">
                    <i class="fa fa-send mr-2"></i> @lang('tables.save')
                </button>
            </div>
        </div>
    </form>
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
