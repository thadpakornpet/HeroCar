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
                            <h2><a class="btn btn-info btn-sm pull-right" href="{!! route('users.index') !!}"><i class="fa fa-arrow-left"></i>&nbsp;@lang('logs.back')</a></h2>
                            @endrole
                        </div>
                        <h2>
                            <span class="text-black">
                                <strong>@lang('logs.edit') {{$user->name}} {{$user->Sirname}}</strong>
                            </span>
                        </h2>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @include('users._form')
                    </div>
                </div>

                @role('super')
                @can('ALL-Plivilege')
                <div class="card">
                    <div class="card-body">
                        @include('users._role')
                    </div>
                </div>
                @endcan
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
