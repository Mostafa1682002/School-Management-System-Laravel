@extends('layouts.master')
@section('title')
    {{ trans('Question_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Question_trans.page_title') }} : <span
                        class="text-danger fs-6">{{ $exam->exam_name }}</span>
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Exams') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Question_trans.page_title') }}</li>
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
                    <a href="{{ route('teacher.questions.create',$exam->id) }}" class="btn btn-success btn-sm" role="button"
                       aria-pressed="true">{{ trans('Question_trans.add_page_title') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Question_trans.exam_name') }}</th>
                                    <th>{{ trans('Question_trans.question_title') }}</th>
                                    <th>{{ trans('Question_trans.question_type') }}</th>
                                    <th>{{ trans('Question_trans.answers') }}</th>
                                    <th>{{ trans('Question_trans.right_answer') }}</th>
                                    <th>{{ trans('Question_trans.question_score') }}</th>
                                    <th>{{ trans('Question_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exam->questions as $question)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $question->exam->exam_name }}</td>
                                        <td>{{ $question->question_title }}</td>
                                        <td>{{ $question->question_type }}</td>
                                        <td>{{ $question->answers }}</td>
                                        <td>{{ $question->right_answer }}</td>
                                        <td>{{ $question->question_score }}</td>
                                        <td>
                                            <a href="{{ route('teacher.questions.edite', $question->id) }}"
                                                class="btn btn-info btn-sm" role="button" aria-pressed="true"
                                                title="{{ trans('Question_trans.edit') }}"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_question{{ $question->id }}"
                                                title="{{ trans('Question_trans.delete') }}"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_question{{ $question->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('Question_trans.delete_question') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('Question_trans.warning_question') }}</p>
                                                        <input type="text" readonly
                                                            value="{{ $question->question_title }}" class="form-control">
                                                        <input type="hidden" name="id" value="{{ $question->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Question_trans.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('Question_trans.delete') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
