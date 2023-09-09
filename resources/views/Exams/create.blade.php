@extends('layouts.master')
@section('title')
    {{ trans('Exam_trans.add_page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Exam_trans.add_page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Exams') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Exam_trans.add_page_title') }}</li>
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
                    <form action="{{ route('exam.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="exam_name_ar">{{ trans('Exam_trans.exam_name_ar') }}</label>
                                <input type="text" name="exam_name_ar" class="form-control" id="exam_name_ar"
                                    value="{{ old('exam_name_ar') }}">
                                @error('exam_name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exam_name_en">{{ trans('Exam_trans.exam_name_en') }}</label>
                                <input type="text" name="exam_name_en" class="form-control" id="exam_name_en"
                                    value="{{ old('exam_name_en') }}">
                                @error('exam_name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Exam_trans.grade') }}</label>
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
                                <label for="inputState">{{ trans('Exam_trans.classroom') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="classe_id">
                                </select>
                                @error('classe_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Exam_trans.subject') }}</label>
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
                                <label for="inputCity">{{ trans('Exam_trans.academic_year') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="academic_year">
                                    <option selected disabled>{{ trans('Teacher_trans.choose') }}</option>
                                    @php $year = date('Y');@endphp
                                    @for ($i = $year; $i <= $year + 1; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Exam_trans.term') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="term_id">
                                    <option selected disabled>{{ trans('Exam_trans.choose') }}</option>
                                    @foreach ($terms as $term)
                                        <option value="{{ $term->id }}">{{ $term->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('term_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>


                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Exam_trans.save') }}</button>
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
