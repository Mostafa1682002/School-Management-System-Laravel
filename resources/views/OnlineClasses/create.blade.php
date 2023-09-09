@extends('layouts.master')
@section('title')
    {{ trans('OnlineClasses_trans.add_page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('OnlineClasses_trans.add_page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_trans.Onlineclasses') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('OnlineClasses_trans.add_page_title') }}</li>
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
                    <a href="{{ route('online-classes.index') }}" class="btn btn-danger btn-sm" role="button"
                        aria-pressed="true">{{ trans('OnlineClasses_trans.back') }}</a><br><br>
                    <form method="post" action="{{ route('online-classes.store') }}" autocomplete="off">
                        @csrf
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                    </select>
                                </div>
                            </div>
                        </div><br> --}}

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('OnlineClasses_trans.grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select my-1 mr-sm-2" name="school_grade_id">
                                    <option selected disabled>{{ trans('Exam_trans.choose') }}</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('school_grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{ trans('OnlineClasses_trans.classroom') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select my-1 mr-sm-2" name="classe_id">
                                </select>
                                @error('classe_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{ trans('OnlineClasses_trans.section') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select my-1 mr-sm-2" name="section_id">
                                </select>
                                @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('OnlineClasses_trans.subject_name') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select my-1 mr-sm-2" name="subject_id">
                                </select>
                                @error('subject_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label>{{ trans('OnlineClasses_trans.topic') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="topic" type="text">
                                @error('topic')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label>{{ trans('OnlineClasses_trans.start_time') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="start_time">
                                @error('start_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('OnlineClasses_trans.start_url') }} : <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" name="start_url" type="text">
                                    @error('start_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ trans('OnlineClasses_trans.join_link') }} : <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" name="join_url" type="text">
                                    @error('join_url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('OnlineClasses_trans.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        //Get Classroom
        $('select[name="school_grade_id"]').change(function() {
            var grade_id = $(this).val();
            $.ajax({
                url: "{{ route('getclass', '') }}/" + grade_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="classe_id"]').empty();
                    $('select[name="classe_id"]').append(
                        "<option selected disabled >{{ trans('Subject_trans.choose') }}</option>"
                    );
                    $.each(data, function(key, value) {
                        $('select[name="classe_id"]').append(
                            '<option value="' + value + '">' + key + '</option>');
                    });
                }
            })
        });
        //Get Sections
        $('select[name="classe_id"]').change(function() {
            var classe_id = $(this).val();
            $.ajax({
                url: "{{ route('getSections', '') }}/" + classe_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('select[name="section_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="section_id"]').append(
                            '<option value="' + value + '">' + key + '</option>');
                    });
                }
            })
        })


        //Get Subjects
        $('select[name="classe_id"]').change(function() {
            var classe_id = $(this).val();
            $.ajax({
                url: "{{ route('getsubject', '') }}/" + classe_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('select[name="subject_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subject_id"]').append(
                            '<option value="' + value + '">' + key + '</option>');
                    });
                }
            })
        })
    </script>
@endsection
