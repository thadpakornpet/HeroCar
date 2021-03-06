@extends('layouts.master')
@section('content')
    <div class="cui-layout-content">
        <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('sold.home')</strong>
        </span>
        </nav>

        <div class="cui-utils-content">
            <div class="card">
                <div class="card-header">
    <span class="cui-utils-title">
      <strong>@lang('sold.detail')
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
                                    @lang('sold.status')
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
                                <strong>@lang('sold.make') {{ $sold->getNameMake->name }} @lang('sold.model') {{ $sold->getNameModel->name }}</strong>
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
                                            >@lang('sold.about')</a
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                href="javascript: void(0);"
                                                data-toggle="tab"
                                                data-target="#tab2"
                                                role="tab"
                                            >@lang('sold.note')</a
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
                                                >@lang('sold.feature')</a
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
                                                        <strong>@lang('sold.body') :</strong> {{ $sold->getNameBodyType->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.country') :</strong> {{ $sold->getNameCountry->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.license') :</strong> {{ $sold->licenseno }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.drive') :</strong> {{ $sold->getNameDrive->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.tran') :</strong> {{ $sold->getNameTran->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.engine') :</strong> {{ $sold->getNameEngine->name }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.fuel') :</strong> {{ $sold->getNameFuel->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.color') :</strong> {{ $sold->getNameColor->name }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.year') :</strong> {{ $sold->year }}
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.mile') :</strong> {{ $sold->miles }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.create') :</strong> {{ $sold->created_at }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>@lang('sold.update') :</strong> {{ $sold->updated_at }}
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
