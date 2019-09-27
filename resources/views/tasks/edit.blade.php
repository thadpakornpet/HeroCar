@extends('layouts.master')

@section('content')
<div class="cui-layout-content">
    <nav class="cui-breadcrumbs cui-breadcrumbs-bg">
        <span class="font-size-18 d-block">
            <span class="text-muted">@lang('logs.home') ·</span>
            <strong>@lang('master.calendar')</strong>
        </span>
    </nav>

    <div class="cui-utils-content">
        <!-- START: tables/basic-tables -->
        <section class="card">
            <div class="card-header">
                <span class="cui-utils-title">
                    <strong>
                        <i class="fa fa-calendar">&nbsp;@lang('master.calendar')</i>
                    </strong>
                </span>
                <a class="btn btn-info btn-sm pull-right" href="{!! route('tasks.index') !!}"><i class="fa fa-arrow-left"></i>&nbsp;@lang('logs.back')</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-horizontal" action="{{ route('tasks.update',$task) }}" method="post">
                            {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    Task name:
                                    <br />
                                    <input class="form-control" style="font-family: 'Pridi', serif;" type="text" name="name" value="{{$task->name}}" />
                                    <br /><br />
                                    Task description:
                                    <br />
                                    <textarea class="form-control" style="font-family: 'Pridi', serif;" name="description">{{ $task->description }}</textarea>
                                    <br /><br />
                                    <!-- Start time:
                                    <br />
                                    <input type="text" name="task_date" class="date form-control"  value="{{$task->task_date}}" />
                                    <br /><br /> -->
                                    <input class="btn btn-primary" type="submit" value="Save" />
                                    <input class="btn btn-danger" type="button" onclick="deleteRow('{!! $task->id !!}')" value="Delete" />



                            </form>
                            <form method="POST" class="hidden" id="formDelete{!! $task->id !!}" action="{!! route('tasks.destroy',$task->id) !!}">
                                                {!! csrf_field() !!}
                                                {{ method_field('DELETE') }}
                                    </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function deleteRow(id){
        var r = confirm("คุณค้องการลบข้อมูล ?"+id);
        if(r){
            $("#formDelete"+id).submit();
        }
    }
</script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
@endsection
