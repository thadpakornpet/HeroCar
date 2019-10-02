@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('tables.make')</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <form action="{{ url('make/edit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>@lang('tables.edit')</h4>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label for="">@lang('tables.model')</label>
                                                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อยี่ห้อ" name="name" required value="{{ $make->name }}"/>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">@lang('tables.couuntry')</label>
                                                    <select name="country_id" style="font-family: 'Pridi', serif;" class="form-control" required>
                                                        @foreach($country as $c)
                                                    <option value="{{ $c->id }}" @if($make->country_id == $c->id) selected @endif>{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">@lang('tables.logo')</label>
                                                    <input type="file" class="form-control" name="logo" value="{{ $make->logo }}"/>
                                                    <br/>
                                                    <img src="{{ asset($make->logo) }}">
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="{{ $make->id }}">
                                        <a href="{{ url('tables/make') }}" class="btn width-200 btn-danger">@lang('tables.back')</a>
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
