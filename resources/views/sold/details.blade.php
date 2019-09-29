@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>ประกาศขายรถ</strong>
        </span>
        </nav>

        <div class="cui-utils-content">
            <div class="card">
                <div class="card-header">
    <span class="cui-utils-title">
      <strong>รายละเอียด
      </strong>
    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cui-ecommerce-catalog-item">
                                <div class="cui-ecommerce-catalog-item-img">
                                    <a href="javascript: void(0);">
                                        @if(isset($imgf))
                                        <img id="targetPhoto" src="{{ asset('imgcar/'.$imgf->image) }}"
                                             alt=""/>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="cui-ecommerce-product-photos clearfix">
                                @if(isset($imgs))
                                    @foreach($imgs as $img)
                                <div class="cui-ecommerce-product-photos-item">
                                    <img src="{{ asset('imgcar/'.$img->image) }}" alt="" width="80" height="80"/>
                                </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <ul class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item">
                                    สถานะ
                                    @if($sold->status == 0)
                                        <button class="btn btn-warning btn-sm">Pending</button>
                                    @endif
                                    @if($sold->status == 1)
                                        <button class="btn btn-success btn-sm">Active</button>
                                    @endif
                                    @if($sold->status == 2)
                                        <button class="btn btn-primary btn-sm">Sold</button>
                                    @endif
                                    @if($sold->status == 3)
                                        <button class="btn btn-secondary btn-sm">Cancel</button>
                                    @endif
                                    @if($sold->status == 4)
                                        <button class="btn btn-danger btn-sm">Reject</button>
                                    @endif
                                </li>
                            </ul>
                            <div class="cui-ecommerce-product-sku">
                                SOLD ID : {{ $sold->id }}
                            </div>
                            <h4 class="cui-ecommerce-product-main-title">
                                <strong>รถ {{ $sold->getNameMake->name }} รุ่น {{ $sold->getNameModel->name }}</strong>
                            </h4>
                            <div class="cui-ecommerce-product-price">
                                THB {{ number_format($sold->price) }}
                            </div>
                            <div class="cui-ecommerce-product-info">
                                <div class="nav-tabs-horizontal">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                href="javascript: void(0);"
                                                data-toggle="tab"
                                                data-target="#tab1"
                                                role="tab"
                                            >เกี่ยวกับรถ</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                href="javascript: void(0);"
                                                data-toggle="tab"
                                                data-target="#tab2"
                                                role="tab"
                                            >บันทึกคนขาย</a
                                            >
                                        </li>
                                        @if(isset($fea))
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link"
                                                    href="javascript: void(0);"
                                                    data-toggle="tab"
                                                    data-target="#tab3"
                                                    role="tab"
                                                >อุปกรณ์หรืออะไหล่เสริม</a
                                                >
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="tab-content pt-3 pb-3">
                                        <div class="tab-pane active" id="tab1">
                                            <dl class="dl-horizontal user-profile-dl">
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>รูปแบบรถ :</strong> {{ $sold->getNameBodyType->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ประเทศ :</strong> {{ $sold->getNameCountry->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ทะเบียน :</strong> {{ $sold->licenseno }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>ขับเคลื่อน :</strong> {{ $sold->getNameDrive->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>เกียร์ :</strong> {{ $sold->getNameTran->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>เครื่องยนต์ :</strong> {{ $sold->getNameEngine->name }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>เชื้อเพลิง :</strong> {{ $sold->getNameFuel->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>สี :</strong> {{ $sold->getNameColor->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ปี :</strong> {{ $sold->year }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>ไมล์ :</strong> {{ $sold->miles }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ประกาศเมื่อ :</strong> {{ $sold->created_at }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>ปรับปรุงเมื่อ :</strong> {{ $sold->updated_at }}
                                                    </div>
                                                </div>
                                            </dl>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <p>
                                                {{ $sold->soldnote }}
                                            </p>
                                        </div>
                                        @if(isset($fea))
                                            <div class="tab-pane" id="tab3">
                                                <p>
                                                    {{ $fea->name }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- START: page scripts -->
            <script>
                ;(function ($) {
                    'use strict'
                    $(function () {
                        // Heart toggle
                        $('.cui-ecommerce-catalog-item-like').on('click', function () {
                            $(this).toggleClass('cui-ecommerce-catalog-item-like-selected')
                        })

                        // Active photo toggle
                        $('.cui-ecommerce-product-photos-item').on('click', function () {
                            $('#targetPhoto').attr(
                                'src',
                                $(this)
                                    .find('img')
                                    .attr('src'),
                            )
                            $('.cui-ecommerce-product-photos-item').removeClass(
                                'cui-ecommerce-product-photos-item-active',
                            )
                            $(this).addClass('cui-ecommerce-product-photos-item-active')
                        })

                        // Tooltip
                        $('[data-toggle=tooltip]').tooltip()

                        // Select 2
                        $('.select2').select2()
                    })
                })(jQuery)
            </script>
            <!-- END: page scripts -->
        </div>
    </div>
@endsection
