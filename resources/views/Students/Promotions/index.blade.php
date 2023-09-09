@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.list_promotion') }}
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
                <h4 class="mb-0">{{ trans('Student_trans.list_promotion') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.list_promotion') }}</li>
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
                    @if ($promotions->count())
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                            {{ trans('Student_trans.everyone_retreated') }}
                        </button>
                    @endif
                    <br><br>


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-info">#</th>
                                    <th class="alert-info">{{ trans('Student_trans.name_student') }}</th>
                                    <th class="alert-danger">{{ trans('Student_trans.old_grade') }}</th>
                                    <th class="alert-danger">{{ trans('Student_trans.old_classroom') }}</th>
                                    <th class="alert-danger">{{ trans('Student_trans.old_section') }}</th>
                                    <th class="alert-danger">{{ trans('Student_trans.old_academic_year') }}</th>
                                    <th class="alert-success">{{ trans('Student_trans.new_grade') }}</th>
                                    <th class="alert-success">{{ trans('Student_trans.new_classroom') }}</th>
                                    <th class="alert-success">{{ trans('Student_trans.new_section') }}</th>
                                    <th class="alert-success">{{ trans('Student_trans.new_academic_year') }}</th>
                                    <th>{{ trans('Student_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $promotion->student->student_name }}</td>
                                        <td>{{ $promotion->f_grade->name }}</td>
                                        <td>{{ $promotion->f_class->class_name }}</td>
                                        <td>{{ $promotion->f_section->section_name }}</td>
                                        <td>{{ $promotion->from_academic_year }}</td>
                                        <td>{{ $promotion->t_grade->name }}</td>
                                        <td>{{ $promotion->t_class->class_name }}</td>
                                        <td>{{ $promotion->t_section->section_name }}</td>
                                        <td>{{ $promotion->to_academic_year }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#Delete_one{{ $promotion->id }}">{{ trans('Student_trans.return_student') }}</button>
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                                data-target="#graduate{{ $promotion->student_id }}">{{ trans('Student_trans.student_graduated') }}</button>
                                        </td>
                                    </tr>
                                    <!-- Return  inFormation One Student -->
                                    <div class="modal fade" id="Delete_one{{ $promotion->id }}" tabindex="-1"
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
                                                    <form
                                                        action="{{ route('promotion.destroyOne', ['id' => $promotion->id, 'stu_id' => $promotion->student_id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $promotion->id }}">
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Student_trans.warning_promotion') }}
                                                        </h5>
                                                        <input type="text" readonly
                                                            value="{{ $promotion->student->student_name }}"
                                                            class="form-control">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Student_trans.close') }}</button>
                                                            <button
                                                                class="btn btn-danger">{{ trans('Student_trans.save') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Gradured Student -->
                                    <div class="modal fade" id="graduate{{ $promotion->student_id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('Student_trans.student_graduated') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('promotion.update', $promotion->student_id) }}"
                                                        method="post" autocomplete="off">
                                                        @method('PUT')
                                                        @csrf
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Student_trans.graduate_procces') }}
                                                        </h5>
                                                        <input type="text" readonly
                                                            value="{{ $promotion->student->student_name }}"
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
                                @endforeach
                                <!-- Deleted All inFormation Student -->
                                <div class="modal fade" id="Delete_all" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">{{ trans('Student_trans.everyone_retreated') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('promotion.destroy', 'test') }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="page_id" value="1">
                                                    <h5 style="font-family: 'Cairo', sans-serif;">
                                                        {{ trans('Student_trans.warning_promotion_all') }}</h5>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Student_trans.close') }}</button>
                                                        <button
                                                            class="btn btn-danger">{{ trans('Student_trans.save') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
