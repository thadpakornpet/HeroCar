<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>

    </title>
    <link href="{{ URL::asset('cleanui/components/dummy-assets/common/img/favicon.png') }}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap&subset=thai" rel="stylesheet">

    <!-- VENDORS -->
    <!-- v2.0.2 -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/ladda/dist/ladda-themeless.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/bootstrap-sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/summernote/dist/summernote.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/ionrangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/c3/c3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/chartist/dist/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/nprogress/nprogress.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/jquery-steps/demo/css/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/font-linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/vendors/font-icomoon/style.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/vendors/font-awesome/css/font-awesome.min.css') }}">
    <script src="{{ URL::asset('cleanui/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-mousewheel/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/spin.js/spin.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/ladda/dist/ladda.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/html5-form-validation/dist/jquery.validation.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-typeahead/dist/jquery.typeahead.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/autosize/dist/autosize.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/moment/min/moment.min.js') }}"></script>
    <script
        src="{{ URL::asset('cleanui/vendors/tempus-dominus-bs4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/fullcalendar/dist/locale-all.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/bootstrap-sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/ionrangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/nestable/jquery.nestable.js') }}"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/fc-3.2.5/r-2.2.2/datatables.min.js"></script>
    <script src="{{ URL::asset('cleanui/vendors/editable-table/mindmup-editabletable.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/d3/d3.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/c3/c3.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/peity/jquery.peity.min.js') }}"></script>
    <script
        src="{{ URL::asset('cleanui/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-countTo/jquery.countTo.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/d3-dsv/dist/d3-dsv.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/d3-time-format/dist/d3-time-format.js') }}"></script>
    <script src="{{ URL::asset('cleanui/vendors/techan/dist/techan.min.js') }}"></script>

    <!-- CLEAN UI HTML ADMIN TEMPLATE MODULES-->
    <!-- v2.0.2 -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/components/core/common/core.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/core/widgets/widgets.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/vendors/common/vendors.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/settings/common/settings.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/settings/themes/themes.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/menu-left/common/menu-left.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/top-bar/common/top-bar.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/breadcrumbs/common/breadcrumbs.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/footer/common/footer.cleanui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/components/pages/common/pages.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/ecommerce/common/ecommerce.cleanui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/components/apps/common/apps.cleanui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/components/blog/common/blog.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/youtube/common/youtube.cleanui.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('cleanui/components/github/common/github.cleanui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('cleanui/components/docs/common/docs.cleanui.css') }}">
    <script src="{{ URL::asset('cleanui/components/menu-left/common/menu-left.cleanui.js') }}"></script>
    <script src="{{ URL::asset('cleanui/components/blog/common/blog.cleanui.js') }}"></script>
    <script src="{{ URL::asset('cleanui/components/github/common/github.cleanui.js') }}"></script>
@yield('style')
<!-- PRELOADER STYLES-->
    <style>
        html, body {
            font-family: 'Pridi', serif;
        }

        ;
        .cui-initial-loading {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-position: center center;
            background-repeat: no-repeat;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDFweCIgIGhlaWdodD0iNDFweCIgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIiBjbGFzcz0ibGRzLXJvbGxpbmciPiAgICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBuZy1hdHRyLXN0cm9rZT0ie3tjb25maWcuY29sb3J9fSIgbmctYXR0ci1zdHJva2Utd2lkdGg9Int7Y29uZmlnLndpZHRofX0iIG5nLWF0dHItcj0ie3tjb25maWcucmFkaXVzfX0iIG5nLWF0dHItc3Ryb2tlLWRhc2hhcnJheT0ie3tjb25maWcuZGFzaGFycmF5fX0iIHN0cm9rZT0iIzAxOTBmZSIgc3Ryb2tlLXdpZHRoPSIxMCIgcj0iMzUiIHN0cm9rZS1kYXNoYXJyYXk9IjE2NC45MzM2MTQzMTM0NjQxNSA1Ni45Nzc4NzE0Mzc4MjEzOCIgdHJhbnNmb3JtPSJyb3RhdGUoODQgNTAgNTApIj4gICAgICA8YW5pbWF0ZVRyYW5zZm9ybSBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgY2FsY01vZGU9ImxpbmVhciIgdmFsdWVzPSIwIDUwIDUwOzM2MCA1MCA1MCIga2V5VGltZXM9IjA7MSIgZHVyPSIxcyIgYmVnaW49IjBzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSI+PC9hbmltYXRlVHJhbnNmb3JtPiAgICA8L2NpcmNsZT4gIDwvc3ZnPg==);
            background-color: #f2f4f8;
        }

        ;
    </style>
    <script>
        $(document).ready(function () {
            $('.cui-initial-loading').delay(200).fadeOut(400)
        })
    </script>
</head>
<body class="cui-config-borderless cui-menu-colorful cui-theme-orange cui-menu-left-shadow">
<div class="cui-initial-loading"></div>
<div class="cui-layout cui-layout-has-sider">
    <nav class="cui-menu-left">
        <div class="cui-menu-left-handler">
            <div class="cui-menu-left-handler-icon"></div>
        </div>
        <div class="cui-menu-left-inner">
            <div class="cui-menu-left-logo">
                <a href="{{ url('/') }}">
                    <img
                        class="cui-menu-left-logo-default"
                        src="{{ asset('cleanui/Capture.PNG') }}"
                        alt=""
                    />
                </a>
            </div>
            <div class="cui-menu-left-scroll">
                <ul class="cui-menu-left-list cui-menu-left-list-root">

                    <li class="cui-menu-left-item @if(Session::get('menu') == 'dashboard') cui-menu-left-item-active @endif">
                        <a href="{{ url('/') }}">
                            <span class="cui-menu-left-icon icmn-home"></span>
                            <span class="cui-menu-left-title">@lang('logs.d')</span>
                        </a>
                    </li>
                    <li class="cui-menu-left-item @if(Session::get('menu') == 'calendar') cui-menu-left-item-active @endif">
                        <a href="{!! route('tasks.index') !!}">
                            <span class="cui-menu-left-icon icmn-calendar"></span>
                            <span class="cui-menu-left-title">@lang('master.calendar')</span>
                        </a>
                    </li>


                    <li class="cui-menu-left-item cui-menu-left-submenu">
                        <a href="javascript: void(0);">
                            <span class="cui-menu-left-icon icmn-users"></span>
                            <span class="cui-menu-left-title">@lang('master.member')</span>
                        </a>
                        <ul class="cui-menu-left-list">
                            <li class="cui-menu-left-item @if(Session::get('menu') == 'profile') cui-menu-left-item-active @endif">
                                <a href="{!! route('users.edit',Auth::user()) !!}">
                                    <span class="cui-menu-left-title">@lang('master.profile')</span>
                                </a>
                            </li>
                            @role('super')
                            <li class="cui-menu-left-item @if(Session::get('menu') == 'adduser') cui-menu-left-item-active @endif">
                                <a href="javascript: void(0);" data-toggle="modal" data-target="#invite">
                                    <span class="cui-menu-left-title">@lang('master.adduser')</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item @if(Session::get('menu') == 'user') cui-menu-left-item-active @endif">
                                <a href="{!! route('users.index') !!}">
                                    <span class="cui-menu-left-title">@lang('master.userr')</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item @if(Session::get('menu') == 'logs') cui-menu-left-item-active @endif">
                                <a href="{!! route('logs.index') !!}">
                                    <span class="cui-menu-left-title">@lang('master.logs')</span>
                                </a>
                            </li>
                            @endrole
                        </ul>
                    </li>
                    @role('super')
                    <li class="cui-menu-left-item cui-menu-left-submenu">
                        <a href="javascript: void(0);">
                            <span class="cui-menu-left-icon icmn-table"></span>
                            <span class="cui-menu-left-title">จัดการข้อมูลรถ</span>
                        </a>
                        <ul class="cui-menu-left-list">
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/country') }}">
                                    <span class="cui-menu-left-title">ข้อมูลประเทศ</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/body') }}">
                                    <span class="cui-menu-left-title">รูปแบบรถ</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/color') }}">
                                    <span class="cui-menu-left-title">ข้อมูลสีของรถ</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/drive') }}">
                                    <span class="cui-menu-left-title">ประเภทขับเคลื่อน</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/engine') }}">
                                    <span class="cui-menu-left-title">ประเภทเครื่องยนต์</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/fuel') }}">
                                    <span class="cui-menu-left-title">ประเภทเชื้อเพลิง</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/make') }}">
                                    <span class="cui-menu-left-title">ยี่ห้อรถ</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/model') }}">
                                    <span class="cui-menu-left-title">รุ่นรถ</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('tables/trans') }}">
                                    <span class="cui-menu-left-title">ระบบเกียร์</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="cui-menu-left-item">
                        <a href="{{ url('sold/manage') }}">
                            <span class="cui-menu-left-icon icmn-stack"></span>
                            <span class="cui-menu-left-title">@lang('master.ms') [ {{ $soldcount }} ]</span>
                        </a>
                    </li>
                    @endrole
                    @hasanyrole('super|owner')
                    <li class="cui-menu-left-item cui-menu-left-submenu">
                        <a href="javascript: void(0);">
                            <span class="cui-menu-left-icon icmn-file-text"></span>
                            <span class="cui-menu-left-title">@lang('master.report')</span>
                        </a>
                        <ul class="cui-menu-left-list">
                            <li class="cui-menu-left-item">
                                <a href="javascript: void(0);" data-toggle="modal" data-target="#">
                                    <span class="cui-menu-left-title">---</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="#">
                                    <span class="cui-menu-left-title">---</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="cui-menu-left-item">
                        <a href="#">
                            <span class="cui-menu-left-icon icmn-stats-bars"></span>
                            <span class="cui-menu-left-title">@lang('master.acc')</span>
                        </a>
                    </li>
                    @endrole
                    @role('owner')
                    <li class="cui-menu-left-item cui-menu-left-submenu">
                        <a href="javascript: void(0);">
                            <span class="cui-menu-left-icon icmn-pen"></span>
                            <span class="cui-menu-left-title">ประกาศขายรถ</span>
                        </a>
                        <ul class="cui-menu-left-list">
                            <li class="cui-menu-left-item">
                                <a href="{{ url('/sold') }}">
                                    <span class="cui-menu-left-title">เพิ่มประกาศ</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item">
                                <a href="{{ url('sold/list') }}">
                                    <span class="cui-menu-left-title">จัดการประกาศ</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('user')
                    <li class="cui-menu-left-item">
                        <a href="#">
                            <span class="cui-menu-left-icon icmn-star-full"></span>
                            <span class="cui-menu-left-title">รายการโปรด</span>
                        </a>
                    </li>
                    @endrole
                    <li class="cui-menu-left-item cui-menu-left-submenu">
                        <a href="javascript: void(0);">
                            <span class="cui-menu-left-icon icmn-mail"></span>
                            <span class="cui-menu-left-title">@lang('master.mail')</span>
                        </a>
                        <ul class="cui-menu-left-list">
                            <li class="cui-menu-left-item">
                                <a href="javascript: void(0);" data-toggle="modal" data-target="#compose">
                                    <span class="cui-menu-left-title">@lang('master.newemail')</span>
                                </a>
                            </li>
                            <li class="cui-menu-left-item @if(Session::get('menu') == 'mailllogs') cui-menu-left-item-active @endif">
                                <a href="{{ url('/mails') }}">
                                    <span class="cui-menu-left-title">@lang('master.maillogs')</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @role('super')
                    <li class="cui-menu-left-item @if(Session::get('menu') == 'company') cui-menu-left-item-active @endif">
                        <a href="{{ url('/company') }}">
                            <span class="cui-menu-left-icon icmn-cog"></span>
                            <span class="cui-menu-left-title">@lang('master.company')</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
        </div>
    </nav>
    <div class="cui-layout">
        <div class="cui-layout-header">
            <div class="cui-topbar">
                <!-- left aligned items -->
                <div class="cui-topbar-left">
                    <div class="cui-topbar-item">
                        <div class="dropdown">
                            <a href="" class="dropdown-toggle text-nowrap" data-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-xl-inline-block"><strong>@lang('master.language')</strong></span>
                            </a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('locale/th') }}">@lang('master.th')</a>
                                <a class="dropdown-item" href="{{ url('locale/en') }}">@lang('master.en')</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- right aligned items -->
                <div class="cui-topbar-right">
                    <div class="cui-topbar-item">
                        <div class="dropdown cui-topbar-avatar-dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                                {{ strtoupper(Auth::user()->getRoleNames()) }} {{ Auth::user()->getPermissionNames() }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href="{!! route('users.edit',Auth::user()) !!}"
                                ><i class="dropdown-icon icmn-pencil"></i> @lang('master.profile')</a
                                >
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                ><i class="dropdown-icon icmn-exit"></i> @lang('master.logout')</a
                                >
                                <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('errors._list')
        @yield('content')


        <div class="cui-layout-footer">
            <div class="cui-footer">
                <div class="cui-footer-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cui-footer-company">
                                        <span>
                                            © 2019 <a href="http://www.imatthio.com" target="_blank">IMATTHIO Company Limited.</a>
                                            All rights reserved
                                        </span>
                            </div>
                        </div>
                    </div>
                    <a
                        href="javascript: void(0);"
                        class="cui-utils-scroll-top"
                        onclick="$('body, html').animate({'scrollTop': 0}, 500)"
                    ><i class="icmn-arrow-up"></i
                        ></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="modal fade modal-size-large"
    id="compose"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <form action="{{ url('/mails') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4>@lang('mails.composem')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>เลือกผู้รับ</label>
                        <select class="form-control select2" multiple="multiple" name="to[]" required
                                style="font-family: 'Pridi', serif;" onchange="yesnoCheck(this);" required>
                            @foreach($mailusers as $mailuser)
                                <option value="{{ $mailuser->email }}">{{ $mailuser->name }} [{{ $mailuser->email }}]
                                </option>
                            @endforeach
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group" id="other" style="display: none;">
                        <label>กรุณาระบุอีเมล์ผู้รับ (หลายคนใช้เครื่อง ,(ลูกน้ำ) ขั้นระหว่างอีเมล์)</label>
                        <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="emails"
                               placeholder="email">
                    </div>
                    <div class="form-group">
                        <label>ชื่อเรื่อง</label>
                        <input type="text" style="font-family: 'Pridi', serif;" class="form-control"
                               placeholder="Subject" name="subject" required/>
                    </div>
                    <textarea class="summernote" name="details"></textarea>
                </div>
                <div class="modal-footer">
                    @lang('mails.att')<input type="file" class="btn btn-link" name="files">
                    <button type="submit" class="btn width-200 btn-primary">
                        <i class="fa fa-send mr-2"></i> @lang('mails.send')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div
    class="modal fade modal-size-large"
    id="invite"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <form action="{{ url('/invite') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4>@lang('master.invite')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('logs.type') :</label>
                        <select class="form-control" name="type" required style="font-family: 'Pridi', serif;">
                            <option value="" disabled selected>--@lang('logs.select')--</option>
                            @foreach($typeofusers as $typeofuser)
                                <option value="{{ $typeofuser->name }}">{{ strtoupper($typeofuser->name) }}</option>
                            @endforeach
                            <option value="" disabled selected>--@lang('logs.select')--</option>
                        </select>
                        <div class="form-group">
                            <label>@lang('logs.email') :</label>
                            <input type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email"
                                   placeholder="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn width-200 btn-primary">
                            <i class="fa fa-send mr-2"></i> @lang('mails.send')
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>

@yield('script')

<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    Tawk_API.visitor = {
        name: '{{ Auth::user()->name }}',
        email: '{{ Auth::user()->email }}',
        hash: '<?php echo hash_hmac("sha256", Auth::user()->email, "8e76d076dd7c12072e23e13745457ad6b2a6fd57"); ?>'
    };
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5d65270077aa790be330f9cd/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>

<script>
    ;

    function yesnoCheck(that) {
        if (that.value == "other") {
            document.getElementById("other").style.display = "block";
        } else {
            document.getElementById("other").style.display = "none";
        }
    }
    ;
    $(function () {
        $('.select2').select2()
        $('.select2-tags').select2({
            tags: true,
        })

        $('.selectpicker').selectpicker()
    })
    ;
    (function ($) {
        'use strict'
        $(function () {
            ///////////////////////////////////////////////////
            // SIDEBAR CURRENT STATE
            $('.cui-apps-messaging-tab').on('click', function () {
                $('.cui-apps-messaging-tab').removeClass('cui-apps-messaging-tab-selected')
                $(this).addClass('cui-apps-messaging-tab-selected')
            })

            ///////////////////////////////////////////////////
            // TEXT EDITOR
            $(function () {
                $('.summernote').summernote({
                    height: 200,
                })
            })
        })
    })(jQuery)
</script>
</body>
</html>
