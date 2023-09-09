@extends('layouts.master')
@section('title')
    {{ trans('Attendance_trans.page_title') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Attendance_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_trans.Attendance') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Attendance_trans.page_title') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        @foreach ($grades as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('Attendance_trans.name_section') }}
                                                                    </th>
                                                                    <th>{{ trans('Attendance_trans.name_classe') }}</th>
                                                                    <th>{{ trans('Attendance_trans.name_teacher') }}
                                                                    </th>
                                                                    <th>{{ trans('Attendance_trans.status') }}</th>
                                                                    <th>{{ trans('Attendance_trans.processes') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($grade->sections as $section)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $section->section_name }}</td>
                                                                        <td>{{ $section->classe->class_name }}</td>
                                                                        <td>
                                                                            @foreach ($section->teachers as $teacher)
                                                                                <p>{{ $teacher->name_teacher }}</p>
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @if ($section->status === 1)
                                                                                <label
                                                                                    class="badge badge-success">{{ trans('Attendance_trans.status_section_ac') }}</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">{{ trans('Attendance_trans.status_section_no') }}</label>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route('attendance.show', $section->id) }}"
                                                                                class="btn btn-info btn-sm">{{ trans('Attendance_trans.page_title') }}</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
