@inject('student', 'App\Models\Student')
@inject('subjects', 'App\Models\Subject')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Title -->
    <title>{{ trans('Dashboard_trans.dashboard_teacher') }}</title>
    @livewireStyles
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--- Style css -->
    <link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet">

    <!--- Style css -->
    @if (App::getLocale() == 'en')
        <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    @endif
</head>

<body>

    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="mb-0">{{ trans('Dashboard_trans.welcom') }} :
                            <span class="text-primary">{{ auth('teacher')->user()->name_teacher }}</span>
                        </h2>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h4 class="card-text text-dark">{{ trans('Dashboard_trans.num_sbjects') }}</h4>
                                    <h5>{{ count(auth('teacher')->user()->subjects) }}</h5>
                                </div>
                            </div>
                            <h6 class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-eye mr-1" aria-hidden="true"></i><a
                                    href="{{ route('teacher.subjects') }}"><span class="text-danger">
                                        {{ trans('Dashboard_trans.show_data') }}
                                    </span></a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <h4 class="card-text text-dark">{{ trans('Dashboard_trans.num_classes') }}</h4>
                                    <h5>{{ count(auth('teacher')->user()->sections) }}</h5>

                                </div>
                            </div>
                            <h6 class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-eye mr-1" aria-hidden="true"></i><a
                                    href="{{ route('teacher.sections') }}"><span class="text-danger">
                                        {{ trans('Dashboard_trans.show_data') }}
                                    </span></a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>



            {{--        <div class="row"> --}}
            {{--            <div style="min-height: 400px;" class="col-xl-12 mb-30"> --}}
            {{--                <div class="card card-statistics h-100"> --}}
            {{--                    <div class="card-body"> --}}
            {{--                        <div class="tab nav-border" style="position: relative;"> --}}
            {{--                            <div class="d-block d-md-flex justify-content-between"> --}}
            {{--                                <div class="d-block w-100"> --}}
            {{--                                    <h5 style="font-family: 'Cairo', sans-serif" class="card-title"> --}}
            {{--                                        {{ trans('Dashboard_trans.latest_operation') }} --}}
            {{--                                    </h5> --}}
            {{--                                </div> --}}
            {{--                                <div class="d-block d-md-flex nav-tabs-custom"> --}}
            {{--                                    <ul class="nav nav-tabs" id="myTab" role="tablist"> --}}

            {{--                                        <li class="nav-item"> --}}
            {{--                                            <a class="nav-link active show" id="students-tab" data-toggle="tab" --}}
            {{--                                               href="#students" role="tab" aria-controls="students" --}}
            {{--                                               aria-selected="true">{{ trans('main_trans.students') }}</a> --}}
            {{--                                        </li> --}}

            {{--                                        <li class="nav-item"> --}}
            {{--                                            <a class="nav-link" id="teachers-tab" data-toggle="tab" --}}
            {{--                                               href="#teachers" role="tab" aria-controls="teachers" --}}
            {{--                                               aria-selected="false">{{ trans('main_trans.Teachers') }} --}}
            {{--                                            </a> --}}
            {{--                                        </li> --}}

            {{--                                        <li class="nav-item"> --}}
            {{--                                            <a class="nav-link" id="parents-tab" data-toggle="tab" --}}
            {{--                                               href="#parents" role="tab" aria-controls="parents" --}}
            {{--                                               aria-selected="false">{{ trans('main_trans.Parents') }} --}}
            {{--                                            </a> --}}
            {{--                                        </li> --}}



            {{--                                    </ul> --}}
            {{--                                </div> --}}
            {{--                            </div> --}}
            {{--                            <div class="tab-content" id="myTabContent"> --}}

            {{--                                <div class="tab-pane fade active show" id="students" role="tabpanel" --}}
            {{--                                     aria-labelledby="students-tab"> --}}
            {{--                                    <div class="table-responsive mt-15"> --}}
            {{--                                        <table style="text-align: center" --}}
            {{--                                               class="table center-aligned-table table-hover mb-0"> --}}
            {{--                                            <thead> --}}
            {{--                                            <tr class="table-dark text-white"> --}}
            {{--                                                <th>#</th> --}}
            {{--                                                <th>{{ trans('Student_trans.name_student') }}</th> --}}
            {{--                                                <th>{{ trans('Student_trans.email') }}</th> --}}
            {{--                                                <th>{{ trans('Student_trans.gender') }}</th> --}}
            {{--                                                <th>{{ trans('Student_trans.grade') }}</th> --}}
            {{--                                                <th>{{ trans('Student_trans.classroom') }}</th> --}}
            {{--                                                <th>{{ trans('Student_trans.section') }}</th> --}}
            {{--                                            </tr> --}}
            {{--                                            </thead> --}}
            {{--                                            <tbody> --}}
            {{--                                            @forelse($student->paginate(5) as $student) --}}
            {{--                                                <tr> --}}
            {{--                                                    <td>{{ $loop->index + 1 }}</td> --}}
            {{--                                                    <td>{{ $student->student_name }}</td> --}}
            {{--                                                    <td>{{ $student->email }}</td> --}}
            {{--                                                    <td>{{ $student->gender->name_gender }}</td> --}}
            {{--                                                    <td>{{ $student->grade->name }}</td> --}}
            {{--                                                    <td>{{ $student->classe->class_name }}</td> --}}
            {{--                                                    <td>{{ $student->section->section_name }}</td> --}}
            {{--                                                    @empty --}}
            {{--                                                        <td colspan="8"> --}}
            {{--                                                            <h4 class="text-danger"> --}}
            {{--                                                                {{ trans('Dashboard_trans.no_data') }} --}}
            {{--                                                            </h4> --}}
            {{--                                                        </td> --}}
            {{--                                                </tr> --}}
            {{--                                            @endforelse --}}
            {{--                                            </tbody> --}}
            {{--                                        </table> --}}
            {{--                                    </div> --}}
            {{--                                </div> --}}

            {{--                                <div class="tab-pane fade" id="teachers" role="tabpanel" --}}
            {{--                                     aria-labelledby="teachers-tab"> --}}
            {{--                                    <div class="table-responsive mt-15"> --}}
            {{--                                        <table style="text-align: center" --}}
            {{--                                               class="table center-aligned-table table-hover mb-0"> --}}
            {{--                                            <thead> --}}
            {{--                                            <tr class="table-dark text-white"> --}}
            {{--                                                <th>#</th> --}}
            {{--                                                <th>{{ trans('Teacher_trans.name_teacher') }}</th> --}}
            {{--                                                <th>{{ trans('Teacher_trans.email') }}</th> --}}
            {{--                                                <th>{{ trans('Teacher_trans.joining_date') }}</th> --}}
            {{--                                                <th>{{ trans('Teacher_trans.specialization') }}</th> --}}
            {{--                                            </tr> --}}
            {{--                                            </thead> --}}
            {{--                                            @forelse($teacher->paginate(5) as $teacher) --}}
            {{--                                                <tbody> --}}
            {{--                                                <tr> --}}
            {{--                                                    <td>{{ $loop->index + 1 }}</td> --}}
            {{--                                                    <td>{{ $teacher->name_teacher }}</td> --}}
            {{--                                                    <td>{{ $teacher->email }}</td> --}}
            {{--                                                    <td>{{ $teacher->created_at }}</td> --}}
            {{--                                                    <td>{{ $teacher->specialization->name_specializ }}</td> --}}
            {{--                                                    @empty --}}
            {{--                                                        <td colspan="8"> --}}
            {{--                                                            <h4 class="text-danger"> --}}
            {{--                                                                {{ trans('Dashboard_trans.no_data') }} --}}
            {{--                                                            </h4> --}}
            {{--                                                        </td> --}}
            {{--                                                </tr> --}}
            {{--                                                </tbody> --}}
            {{--                                            @endforelse --}}
            {{--                                        </table> --}}
            {{--                                    </div> --}}
            {{--                                </div> --}}


            {{--                                <div class="tab-pane fade" id="parents" role="tabpanel" --}}
            {{--                                     aria-labelledby="parents-tab"> --}}
            {{--                                    <div class="table-responsive mt-15"> --}}
            {{--                                        <table style="text-align: center" --}}
            {{--                                               class="table center-aligned-table table-hover mb-0"> --}}
            {{--                                            <thead> --}}
            {{--                                            <tr class="table-dark text-white"> --}}
            {{--                                                <th>#</th> --}}
            {{--                                                <th>{{ trans('Myparent_trans.email') }}</th> --}}
            {{--                                                <th>{{ trans('Myparent_trans.name_father') }}</th> --}}
            {{--                                                <th>{{ trans('Myparent_trans.national_id_father') }}</th> --}}
            {{--                                                <th>{{ trans('Myparent_trans.passport_id_father') }}</th> --}}
            {{--                                                <th>{{ trans('Myparent_trans.phone_father') }}</th> --}}
            {{--                                                <th>{{ trans('Myparent_trans.job_father') }}</th> --}}
            {{--                                            </tr> --}}
            {{--                                            </thead> --}}
            {{--                                            <tbody> --}}
            {{--                                            @forelse($parent->take(5)->get() as $parent) --}}
            {{--                                                <tr> --}}
            {{--                                                    <td>{{ $loop->index + 1 }}</td> --}}
            {{--                                                    <td>{{ $parent->email }}</td> --}}
            {{--                                                    <td>{{ $parent->name_father }}</td> --}}
            {{--                                                    <td>{{ $parent->national_id_father }}</td> --}}
            {{--                                                    <td>{{ $parent->passport_id_father }}</td> --}}
            {{--                                                    <td>{{ $parent->phone_father }}</td> --}}
            {{--                                                    <td>{{ $parent->job_father }}</td> --}}
            {{--                                                    @empty --}}
            {{--                                                        <td colspan="8"> --}}
            {{--                                                            <h4 class="text-danger"> --}}
            {{--                                                                {{ trans('Dashboard_trans.no_data') }} --}}
            {{--                                                            </h4> --}}
            {{--                                                        </td> --}}
            {{--                                                </tr> --}}
            {{--                                            @endforelse --}}
            {{--                                            </tbody> --}}
            {{--                                        </table> --}}
            {{--                                    </div> --}}
            {{--                                </div> --}}


            {{--                            </div> --}}

            {{--                        </div> --}}
            {{--                    </div> --}}
            {{--                </div> --}}
            {{--            </div> --}}
            {{--        </div> --}}

            <livewire:calendar />

        </div>
        @include('layouts.footer')
    </div>

    <!--=================================footer -->
    @livewireScripts
    @stack('scripts')
    <!-- jquery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- plugin_path -->
    <script type="text/javascript">
        var plugin_path = "{{ asset('assets/js') }}/";
    </script>
    <!-- chart -->
    <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
    <!-- calendar -->
    <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
    <!-- charts sparkline -->
    <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
    <!-- charts morris -->
    <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <!-- sweetalert2 -->
    <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
    <!-- validation -->
    <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
    <!-- lobilist -->
    <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
    <!-- custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
</body>

</html>
