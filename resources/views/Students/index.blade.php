@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Student_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.page_title') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {{-- include Message --}}
                    @include('layouts.message')
                    {{-- include Message --}}
                    <a href="{{ route('student.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Student_trans.add_page_title') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Student_trans.name_student') }}</th>
                                    <th>{{ trans('Student_trans.email') }}</th>
                                    <th>{{ trans('Student_trans.gender') }}</th>
                                    <th>{{ trans('Student_trans.grade') }}</th>
                                    <th>{{ trans('Student_trans.classroom') }}</th>
                                    <th>{{ trans('Student_trans.section') }}</th>
                                    <th>{{ trans('Student_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $student->student_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->gender->name_gender }}</td>
                                        <td>{{ $student->grade->name }}</td>
                                        <td>{{ $student->classe->class_name }}</td>
                                        <td>{{ $student->section->section_name }}</td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    {{ trans('Student_trans.processes') }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item"
                                                        href="{{ route('student.show', $student->id) }}"><i
                                                            style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                        {{ trans('Student_trans.show_student_details') }}
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('student.edit', $student->id) }}"><i
                                                            style="color:green" class="fa fa-edit"></i>&nbsp;
                                                        {{ trans('Student_trans.edite_page_title') }}
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('feese_invoice.show', $student->id) }}"><i
                                                            style="color: #0000cc" class="fa fa-edit"></i>&nbsp;
                                                        {{ trans('Student_trans.add_feese') }}
                                                    </a>

                                                    {{-- <a class="dropdown-item"
                                                    href="{{ route('receipt_students.show', $student->id) }}"><i
                                                            style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp;
                                                        &nbsp;سند قبض</a> --}}
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('ProcessingFee.show', $student->id) }}"><i
                                                            style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp;
                                                        &nbsp; استبعاد رسوم</a> --}}
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('Payment_students.show', $student->id) }}"><i
                                                        style="color:goldenrod" class="fas fa-donate"></i>&nbsp;
                                                        &nbsp;سند صرف</a> --}}
                                                    <a class="dropdown-item"
                                                        data-target="#Delete_Student{{ $student->id }}"
                                                        data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i
                                                            style="color: red" class="fa fa-trash"></i>&nbsp;
                                                        {{ trans('Student_trans.delete_student') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <!-- Deleted inFormation Student -->
                                    <div class="modal fade" id="Delete_Student{{ $student->id }}" tabindex="-1"
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
                                                    <form action="{{ route('student.destroy', $student->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Student_trans.warning_student') }}</h5>
                                                        <input type="text" readonly value="{{ $student->student_name }}"
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
