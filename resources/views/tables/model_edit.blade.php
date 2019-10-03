@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
        <span class="text-muted">@lang('model.home') ·</span>

<strong>@lang('model.model')</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <form action="{{ url('model/edit') }}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>@lang('model.modeledit')</h4>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label>@lang('model.name')</label>
                                            <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อรุ่นรถ" name="name" required value="{{ $model->name }}"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('model.cartype')</label>
                                                    <select name="bodytype" style="font-family: 'Pridi', serif;" class="form-control" required>
                                                            @foreach($body as $b)
                                                        <option value="{{ $b->id }}" @if($model->bodytype == $b->id) selected @endif>{{ $b->name }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                        <label>@lang('model.carbrand')</label>
                                                        <select name="makeid" style="font-family: 'Pridi', serif;" class="form-control" required>
                                                                @foreach($make as $m)
                                                            <option value="{{ $m->id }}" @if($model->makeid == $m->id) selected @endif>{{ $m->name }}</option>
                                                                @endforeach
                                                            </select>
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="{{ $model->id }}">
                                        <a href="{{ url('tables/model') }}" class="btn width-200 btn-danger">@lang('model.back')</a>
                                        <button type="submit" class="btn width-200 btn-primary">
                                            <i class="fa fa-send mr-2"></i> @lang('model.submit')
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
