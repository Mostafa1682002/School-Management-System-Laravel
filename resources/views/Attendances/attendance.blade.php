@extends('layouts.master')
@section('title')
    {{ trans('Attendance_trans.attendance_page_title') }} {{ $section->section_name }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Attendance_trans.attendance_page_title') }} {{ $section->section_name }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_trans.Attendance') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Attendance_trans.attendance_page_title') }}
                        {{ $section->section_name }}</li>
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
                    {{-- include Message --}}
                    @include('layouts.message')
                    {{-- include Message --}}
                    <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('Attendance_trans.date') }}
                        {{ date('Y-m-d') }}</h5>
                    <form method="post" action="{{ route('attendance.store') }}">
                        @csrf
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-success">#</th>
                                    <th class="alert-success">{{ trans('Attendance_trans.name_student') }}</th>
                                    <th class="alert-success">{{ trans('Attendance_trans.email') }}</th>
                                    <th class="alert-success">{{ trans('Attendance_trans.gender') }}</th>
                                    <th class="alert-success">{{ trans('Attendance_trans.grade') }}</th>
                                    <th class="alert-success">{{ trans('Attendance_trans.classroom') }}</th>
                                    <th class="alert-success">{{ trans('Attendance_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($section->students as $student)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $student->student_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender->name_gender }}</td>
                                        <td>{{ $student->grade->name }}</td>
                                        <td>{{ $student->classe->class_name }}</td>
                                        <td>
                                            @if (isset(
                                                    $student->attendance()->where('attendence_date', date('Y-m-d'))->first()->student_id))
                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendences[{{ $student->id }}]" disabled
                                                        {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                                        class="leading-tight" type="radio" value="presence">
                                                    <span
                                                        class="text-success">{{ trans('Attendance_trans.presence') }}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendences[{{ $student->id }}]" disabled
                                                        {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                                        class="leading-tight" type="radio" value="absent">
                                                    <span
                                                        class="text-danger">{{ trans('Attendance_trans.absence') }}</span>
                                                </label>
                                            @else
                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendences[{{ $student->id }}]" class="leading-tight"
                                                        type="radio" value="presence">
                                                    <span
                                                        class="text-success">{{ trans('Attendance_trans.presence') }}</span>
                                                </label>
                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendences[{{ $student->id }}]" class="leading-tight"
                                                        type="radio" value="absent">
                                                    <span
                                                        class="text-danger">{{ trans('Attendance_trans.absence') }}</span>
                                                </label>
                                            @endif
                                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <P>
                            <button class="btn btn-success" type="submit">{{ trans('Attendance_trans.submit') }}</button>
                        </P>
                    </form><br>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
