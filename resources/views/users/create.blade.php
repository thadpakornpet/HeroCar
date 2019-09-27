@extends('layouts.master')

@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('logs.createuser')</strong>
        </span>
    </nav>
    
    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <i class="fa fa-user">&nbsp;@lang('logs.createuser')</i>
                    </strong>
                </span>
                <a class="btn btn-info btn-sm pull-right" href="{!! route('users.index') !!}"><i class="fa fa-arrow-left"></i>&nbsp;@lang('logs.back')</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('users._form')
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection