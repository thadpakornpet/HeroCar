@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('tables.model')</strong>
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
                @endrole
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
                                        <th>
                                            @lang('tables.body')
                                            </th>
                                            <th>
                                                @lang('tables.make')
                                                </th>
                                        @role('super')
                                        <th class="text-center">
                                            @lang('tables.manage')
                                        </th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                                {{ $user->body->name }}
                                            </td>
                                            <td>
                                                    {{ $user->make->name }}
                                                </td>
                                        <td class="text-center">
                                            @role('super')
                                            <a title="แก้ไข" href="{{ url('tables/model/'.$user->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                            <a title="ลบ" onclick="deleteRow('{!! $user->id !!}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @endrole
                                        <form method="POST" class="hidden" id="formDelete{!! $user->id !!}" action="{{ url('tables/model/delete') }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" value="{{ $user->id }}" name="id">
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
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
<form action="{{ url('model/create') }}" method="post">
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
                    <label>@lang('tables.model')</label>
                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อรุ่นรถ" name="name" required/>
                </div>
                <div class="form-group">
                    <label>@lang('tables.body')</label>
                    <select name="bodytype" style="font-family: 'Pridi', serif;" class="form-control" required>
                            @foreach($body as $b)
                        <option value="{{ $b->id }}">{{ $b->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                        <label>@lang('tables.make')</label>
                        <select name="makeid" style="font-family: 'Pridi', serif;" class="form-control" required>
                                @foreach($make as $m)
                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>
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
