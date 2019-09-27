@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">Home ·</span>
            <strong>Body Type</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <form action="{{ url('body/edit') }}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>แก้ไขรูปแบบรถ</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อประเทศ(เต็ม)" name="name" value="{{ $body->name }}" required/>
                                        </div>
                                        <div class="form-group">
                                                <input type="file" class="form-control" name="image" value="{{ $body->image }}"/>
                                                <br/>
                                                <img src="{{ asset($body->image) }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="{{ $body->id }}">
                                        <a href="{{ url('tables/body') }}" class="btn width-200 btn-danger">กลับ</a>
                                        <button type="submit" class="btn width-200 btn-primary">
                                            <i class="fa fa-send mr-2"></i> บันทึก
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
