@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">Home ·</span>
            <strong>Make Type</strong>
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
                                        <h4>แก้ไขยี่ห้อรถ</h4>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group">
                                                    <label for="">ชื่อยี่ห้อ</label>
                                                    <input type="text" class="form-control" style="font-family: 'Pridi', serif;" placeholder="ชื่อยี่ห้อ" name="name" required value="{{ $make->name }}"/>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">ประเทศ</label>
                                                    <select name="country_id" style="font-family: 'Pridi', serif;" class="form-control" required>
                                                        @foreach($country as $c)
                                                    <option value="{{ $c->id }}" @if($make->country_id == $c->id) selected @endif>{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">โลโก้ยี่ห้อ</label>
                                                    <input type="file" class="form-control" name="logo" value="{{ $make->logo }}"/>
                                                    <br/>
                                                    <img src="{{ asset($make->logo) }}">
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value="{{ $make->id }}">
                                        <a href="{{ url('tables/make') }}" class="btn width-200 btn-danger">กลับ</a>
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
