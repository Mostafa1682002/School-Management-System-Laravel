@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.graduated_list') }}
@endsection
@section('css')
    <style>
        tr th,
        tr td {
            white-space: nowrap;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Student_trans.graduated_list') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.graduated_list') }}</li>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>{{ trans('Student_trans.name_student') }}</th>
                                    <th>{{ trans('Student_trans.email') }}</th>
                                    <th>{{ trans('Student_trans.grade') }}</th>
                                    <th>{{ trans('Student_trans.classroom') }}</th>
                                    <th>{{ trans('Student_trans.section') }}</th>
                                    <th>{{ trans('Student_trans.academic_year') }}</th>
                                    <th>{{ trans('Student_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($graduates as $graduate)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $graduate->student->student_name }}</td>
                                        <td>{{ $graduate->student->email }}</td>
                                        <td>{{ $graduate->student->grade->name }}</td>
                                        <td>{{ $graduate->student->classe->class_name }}</td>
                                        <td>{{ $graduate->student->section->section_name }}</td>
                                        <td>{{ $graduate->student->academic_year }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#Return_Student{{ $graduate->id }}"
                                                title="{{ trans('Student_trans.return_student') }}">{{ trans('Student_trans.return_student') }}</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#Delete_Student{{ $graduate->student_id }}"
                                                title="{{ trans('Grades_trans.delete') }}">{{ trans('Student_trans.delete_student') }}</button>
                                        </td>
                                    </tr>
                                    <!-- Return inFormation Student -->
                                    <div class="modal fade" id="Return_Student{{ $graduate->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">{{ trans('Student_trans.return_student') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('graduated.update', $graduate->id) }}"
                                                        method="post" autocomplete="off">
                                                        @method('PUT')
                                                        @csrf
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Student_trans.graduate_procces') }}
                                                        </h5>
                                                        <input type="text" readonly
                                                            value="{{ $graduate->student->student_name }}"
                                                            class="form-control">

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Student_trans.close') }}</button>
                                                            <button
                                                                class="btn btn-danger">{{ trans('Student_trans.sure') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Deleted inFormation Student -->
                                    <div class="modal fade" id="Delete_Student{{ $graduate->student_id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('Student_trans.delete_student') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('graduated.destroy', $graduate->student_id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id"
                                                            value="{{ $graduate->student_id }}">
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Student_trans.warning_student') }}</h5>
                                                        <input type="text" readonly
                                                            value="{{ $graduate->student->student_name }}"
                                                            class="form-control">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Student_trans.close') }}</button>
                                                            <button
                                                                class="btn btn-danger">{{ trans('Student_trans.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
