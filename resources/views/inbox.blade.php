@extends('layouts.master')
@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">

        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('mails.inbox') #{{ $inbox->id }}</strong>
        </span>
    </nav>
    <div class="cui-utils-content">
        <!-- START: components/mail-templates -->
        <section class="card">
            <div class="card-header">
                <div class="pull-right">
                    <a href="{{ url('/mails') }}" class="btn btn-primary">
                        <i class="dropdown-icon icmn-backward"></i>
                        @lang('logs.back')
                    </a>
                </div>
                <span class="cui-utils-title">
                    <strong>{{ $inbox->title }}</strong>
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-black"><strong>{{ $inbox->users->name }} [{{ $inbox->users->email }}]</strong></h5>
                        <p class="text-muted">@lang('mails.to') {{ $inbox->toemail }}</p>
                        <div class="mb-5">
                            <!-- Start Letter -->
                            {!! $inbox->remark !!}
                            <!-- End Start Letter -->
                            @if($inbox->attachment)
                            <hr/>
                            <a href="{{ url('mails/getDownload/'.$inbox->attachment) }}">{!! $inbox->attachment !!}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: components/mail-templates -->
    </div>
</div>
@endsection