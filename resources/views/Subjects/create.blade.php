@extends('layouts.master')
@section('title')
    {{ trans('Subject_trans.add_page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Subject_trans.add_page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Subjects') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Subject_trans.add_page_title') }}</li>
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
                    <form action="{{ route('subject.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="name_subject_ar">{{ trans('Subject_trans.name_subject_ar') }}</label>
                                <input type="text" name="subject_name_ar" class="form-control" id="name_subject_ar"
                                    value="{{ old('subject_name_ar') }}">
                                @error('subject_name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('Subject_trans.name_subject_en') }}</label>
                                <input type="text" name="subject_name_en" class="form-control"
                                    value="{{ old('subject_name_en') }}">
                                @error('subject_name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Subject_trans.grade') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="school_grade_id">
                                    <option selected disabled>{{ trans('Teacher_trans.choose') }}</option>
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
                                <label for="inputState">{{ trans('Subject_trans.classroom') }}</label>
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
                                <label for="inputCity">{{ trans('Subject_trans.name_teacher') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                    <option selected disabled>{{ trans('Subject_trans.choose') }}</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name_teacher }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>


                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Subject_trans.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('select[name="school_grade_id"]').change(function() {
            var grade_id = $(this).val();
            console.log(grade_id);
            $.ajax({
                url: "{{ route('getclass', '') }}/" + grade_id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
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
        })
    </script>
@endsection
