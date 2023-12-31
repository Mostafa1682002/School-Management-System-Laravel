@extends('layouts.master')
@section('title')
    {{ trans('Teacher_trans.edite_page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Teacher_trans.edite_page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Teachers') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Teacher_trans.edite_page_title') }}</li>
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
                    <form action="{{ route('teachers.update', $teacher->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('Teacher_trans.email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{ $teacher->email }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('Teacher_trans.password') }}</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>


                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{ trans('Teacher_trans.name_teacher_ar') }}</label>
                                <input type="text" name="name_ar" class="form-control"
                                    value="{{ $teacher->getTranslation('name_teacher', 'ar') }}">
                                @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{ trans('Teacher_trans.name_teacher_en') }}</label>
                                <input type="text" name="name_en" class="form-control"
                                    value="{{ $teacher->getTranslation('name_teacher', 'en') }}">
                                @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{ trans('Teacher_trans.specialization') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                    <option value="{{ $teacher->specialization_id }}">
                                        {{ $teacher->specialization->name_specializ }}</option>
                                    @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}">{{ $specialization->name_specializ }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{ trans('Teacher_trans.gender') }}</label>
                                <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                    <option value="{{ $teacher->gender_id }}">{{ $teacher->gender->name_gender }}</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name_gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('Teacher_trans.address') }}</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="4">{{ $teacher->address }}</textarea>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Teacher_trans.edit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
