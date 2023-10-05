@extends('layouts.master')
@section('title')
    {{ trans('Exam_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Exam_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Exams') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Exam_trans.page_title') }}</li>
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
                    <a href="{{ route('exam.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Exam_trans.add_page_title') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Exam_trans.exam_name') }}</th>
                                    <th>{{ trans('Exam_trans.subject') }}</th>
                                    <th>{{ trans('Exam_trans.name_teacher') }}</th>
                                    <th>{{ trans('Exam_trans.grade') }}</th>
                                    <th>{{ trans('Exam_trans.classroom') }}</th>
                                    <th>{{ trans('Exam_trans.term') }}</th>
                                    <th>{{ trans('Exam_trans.academic_year') }}</th>
                                    <th>{{ trans('Exam_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exams as $exam)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $exam->exam_name }}</td>
                                        <td>{{ $exam->subject->subject_name }}</td>
                                        <td>{{ $exam->subject->teacher->name_teacher }}</td>
                                        <td>{{ $exam->grade->name }}</td>
                                        <td>{{ $exam->classe->class_name }}</td>
                                        <td>{{ $exam->term->name }}</td>
                                        <td>{{ $exam->academic_year }}</td>
                                        <td>
                                            <a href="{{ route('teacher.questions.show', $exam->id) }}"
                                                class="btn btn-warning btn-sm" role="button" aria-pressed="true"
                                                title="{{ trans('Exam_trans.show_q') }}"><i style="color: #fff"
                                                    class="far fa-eye "></i></a>
                                            <a href="{{ route('teacher.questions.create', $exam->id) }}" class="btn btn-info btn-sm"
                                                role="button" aria-pressed="true"
                                                title="{{  trans('Exam_trans.add_questions') }}"><i class="fa fa-plus"></i></a>
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
    <!-- row closed -->
@endsection
@section('js')
@endsection
