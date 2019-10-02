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
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <form action="{{ url('fuel/edit') }}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>@lang('tables.edit')</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อสี" name="name" value="{{ $fuel->name }}" required/>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="{{ $fuel->id }}">
                                        <a href="{{ url('tables/fuel') }}" class="btn width-200 btn-danger">@lang('tables.back')</a>
                                        <button type="submit" class="btn width-200 btn-primary">
                                            <i class="fa fa-send mr-2"></i> @lang('tables.save')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
