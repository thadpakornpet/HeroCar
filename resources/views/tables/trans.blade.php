@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
        <span class="text-muted">@lang('transmission.home') ·</span>

<strong>@lang('transmission.transmission')</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        @if(count($users)>0)
                        @lang('transmission.list')
                        {{($users->currentPage() - 1) * 20 + 1 }} -
                        {{min( $users->total(), $users->currentPage() * 20)}}
                        @lang('transmission.form')
                        {{$users->total()}}
                        @else
                        @lang('transmission.list')
                        @endif
                    </strong>
                </span>

                @role('super')
                <a href="" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#createbody">&nbsp;@lang('transmission.add')</a>
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
                                        @lang('transmission.name')
                                        </th>
                                        @role('super')
                                        <th class="text-center">
                                        @lang('transmission.manage')
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
                                            <a title="@lang('transmission.edit')" href="{{ url('tables/trans/'.$user->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                            <a title="@lang('transmission.delete')" onclick="deleteRow('{!! $user->id !!}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @endrole
                                        <form method="POST" class="hidden" id="formDelete{!! $user->id !!}" action="{{ url('tables/trans/delete') }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" value="{{ $user->id }}" name="id">
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">
                                        @lang('transmission.error')
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
<form action="{{ url('trans/create') }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4>@lang('transmission.create')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="@lang('transmission.name')" name="name" required/>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn width-200 btn-primary">
                    <i class="fa fa-send mr-2"></i> @lang('transmission.submit')
                </button>
            </div>
        </div>
    </form>
</div>
</div>

<script>
    function deleteRow(id) {
        var r = confirm("@lang('transmission.confirm') ?");
        if (r) {
            $("#formDelete" + id).submit();
        }
    }
</script>
@endsection
