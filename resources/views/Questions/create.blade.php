@extends('layouts.master')
@section('title')
    {{ trans('Question_trans.add_page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Question_trans.add_page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Exams') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Question_trans.add_page_title') }}</li>
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
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Exam_trans.exam_name') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="exam_id">
                                    <option selected disabled>{{ trans('Question_trans.choose') }}</option>
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}">{{ $exam->exam_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('exam_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Question_trans.question_type') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="question_type">
                                    <option selected disabled>{{ trans('Question_trans.choose') }}</option>
                                    <option value="mcq">mcq</option>
                                    <option value="writing">writing</option>
                                </select>
                                @error('question_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="question_title">{{ trans('Question_trans.question_title') }}</label>
                                <input type="text" name="question_title" id="question_title"
                                    class="form-control form-control-alternative" value="{{ old('question_title') }}">
                                @error('question_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="answers">{{ trans('Question_trans.answers') }}</label>
                                <textarea name="answers" class="form-control" id="answers" rows="4">{{ old('answers') }}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="right_answer">{{ trans('Question_trans.right_answer') }}</label>
                                <input type="text" name="right_answer" id="right_answer"
                                    class="form-control form-control-alternative" value="{{ old('right_answer') }}">
                                @error('right_answer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="question_score">{{ trans('Question_trans.question_score') }}</label>
                                <input type="number" name="question_score" id="question_score" min="1"
                                    max="100" class="form-control form-control-alternative"
                                    value="{{ old('question_score') }}">
                                @error('question_score')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Question_trans.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
