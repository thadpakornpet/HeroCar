@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('logs.edit')</strong>
        </span>
        </nav>

        <div class="cui-utils-content">
            <!-- START: tables/basic-tables -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="width-100 text-center pull-right hidden-md-down">
                                @role('super')
                                <h2><a class="btn btn-info btn-sm pull-right" href="{!! route('users.index') !!}"><i
                                            class="fa fa-arrow-left"></i>&nbsp;@lang('logs.back')</a></h2>
                                @endrole
                            </div>
                            <h2>
                            <span class="text-black">
                                <strong>@lang('logs.edit') {{$user->name}} {{$user->Sirname}}</strong>
                            </span>
                            </h2>
                        </div>
                    </div>
                    @role('super')
                    @if($user->thai == "Y")
                        <div class="card">
                            <div class="card-body">
                                @include('users._form_thai')
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                @include('users._form_nothai')
                            </div>
                        </div>
                    @endif

                    @can('ALL-Plivilege')
                        <div class="card">
                            <div class="card-body">
                                @include('users._role')
                            </div>
                        </div>
                    @endcan
                    @endrole

                    @hasanyrole('owner|user')
                    @if($user->thai == "")
                        <div class="card">
                            <div class="card-body">
                                <h3>
                                    <center>
                                        <span class="text-black">@lang('master.thaipeople')</span><br/><br/>
                                        <button type="button" class="btn btn-outline-success"
                                                onclick="address('Y');">@lang('master.yes')</button>
                                        <button type="button" class="btn btn-outline-danger"
                                                onclick="address('N');">@lang('master.no')</button>
                                    </center>
                                </h3>
                            </div>
                        </div>
                    @else
                        @if($user->thai == "Y")
                            <div class="card">
                                <div class="card-body">
                                    @include('users._form_thai')
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    @include('users._form_nothai')
                                </div>
                            </div>
                        @endif

                        @role('super')
                        @can('ALL-Plivilege')
                            <div class="card">
                                <div class="card-body">
                                    @include('users._role')
                                </div>
                            </div>
                        @endcan
                        @endrole
                    @endif
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function address(a) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('user/updatethai') }}",
                data: {data: a},
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    swal({
                        title: '@lang("sold.success")!',
                        type: 'success',
                        confirmButtonClass: 'btn-success',
                    });
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                    swal({
                        title: '@lang("sold.error")',
                        type: 'error',
                        confirmButtonClass: 'btn-danger',
                    })
                }
            })
        }
    </script>
@endsection
