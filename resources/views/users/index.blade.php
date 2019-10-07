@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('logs.listofuser')</strong>
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
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            @lang('logs.name')
                                        </th>
                                        <th>
                                            @lang('logs.email')
                                        </th>
                                        <th>
                                            @lang('logs.phone')
                                        </th>
                                        <th>
                                            @lang('logs.address')
                                        </th>
                                        <th>
                                            @lang('logs.status')
                                        </th>
                                        @role('super')
                                        <th class="text-center">
                                            @lang('logs.manage')
                                        </th>
                                        @endrole
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {!! $user->email !!}
                                            </td>
                                            <td>
                                                @if(isset($user->getprofiles->phone1))
                                                    {!! $user->getprofiles->phone1 !!}
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($user->getprofiles->address1))
                                                    {!! $user->getprofiles->address1 !!}
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->status == 0) <font color="green" class="btn btn-info btn-sm">Active</font> @elseif($user->status == 1)
                                                    <font color="red"
                                                          class="btn btn-danger btn-sm">Deactivate</font> @else <font
                                                    color="gray" class="btn btn-warning btn-sm">Pending</font> @endif
                                            </td>
                                            <td class="text-center">
                                                @role('super')
                                                <a href="{!! route('users.show',$user) !!}" title="รายละเอียด"
                                                   class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                @can('ALL-Plivilege')
                                                    @if($user->thai != "" && (isset($user->getprofiles->address1)))
                                                        <a title="แก้ไข" href="{!! route('users.edit',$user) !!}"
                                                           class="btn btn-success btn-sm"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @endif
                                                    @if($user->status != 1)
                                                        <a title="ลบ" onclick="deleteRow('{!! $user->id !!}')"
                                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                @endcan
                                                @endrole
                                                <form method="POST" class="hidden" id="formDelete{!! $user->id !!}"
                                                      action="{!! route('users.destroy',$user) !!}">
                                                    {!! csrf_field() !!}
                                                    {{ method_field('DELETE') }}
                                                </form>
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
                            {{ $users->render() }}
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
