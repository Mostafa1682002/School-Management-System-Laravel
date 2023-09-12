@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.edite_page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Student_trans.edite_page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.edite_page_title') }}</li>
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
                    <form method="post" action="{{ route('students.update', $student->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                            {{ trans('Student_trans.personal_information') }}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Student_trans.name_ar') }} : <span class="text-danger">*</span></label>
                                    <input type="text" name="name_ar" class="form-control"
                                        value="{{ $student->getTranslation('student_name', 'ar') }}">
                                    @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Student_trans.name_en') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="name_en" type="text"
                                        value="{{ $student->getTranslation('student_name', 'en') }}">
                                    @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Student_trans.email') }} : </label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $student->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('Student_trans.password') }} :</label>
                                    <input type="password" name="password" class="form-control"
                                        value="{{ $student->password }}">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">{{ trans('Student_trans.gender') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender_id">
                                        <option value="{{ $student->gender_id }}" selected>
                                            {{ $student->gender->name_gender }}
                                        </option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name_gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">{{ trans('Student_trans.nationality') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option value="{{ $student->nationalitie_id }}" selected>
                                            {{ $student->nationalitie->nationality_name }}
                                        </option>
                                        @foreach ($nationalites as $nationalite)
                                            <option value="{{ $nationalite->id }}">{{ $nationalite->nationality_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nationalitie_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{ trans('Student_trans.blood_type') }} : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option value="{{ $student->blood_id }}">{{ $student->blood->blood_name }}
                                        </option>
                                        @foreach ($type_bloods as $type_blood)
                                            <option value="{{ $type_blood->id }}">{{ $type_blood->blood_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blood_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ trans('Student_trans.date_of_birth') }} :</label>
                                    <input class="form-control" type="text" id="datepicker-action" name="date_birth"
                                        data-date-format="yyyy-mm-dd" value="{{ $student->date_birth }}">
                                    @error('date_birth')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                            {{ trans('Student_trans.student_information') }}</h6><br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Student_trans.grade') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id" onchange="ShowClasse(this)">
                                        <option value="{{ $student->grade_id }}">{{ $student->grade->name }}</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Student_trans.classroom') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="class_id" id="class_id"
                                        onchange="ShowSections(this)">
                                        <option value="{{ $student->class_id }}" selected>
                                            {{ $student->classe->class_name }}
                                        </option>
                                    </select>
                                    @error('class_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('Student_trans.section') }} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id" id="section_id">
                                        <option value="{{ $student->section_id }}" selected>
                                            {{ $student->section->section_name }}
                                        </option>
                                    </select>
                                    @error('section_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{ trans('Student_trans.parent') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option value="{{ $student->parent_id }}">{{ $student->parent->name_father }}
                                        </option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name_father }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{ trans('Student_trans.academic_year') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option value="{{ $student->academic_year }}" selected>
                                            {{ $student->academic_year }}
                                        </option>
                                        @php
                                            $current_year = date('Y');
                                        @endphp
                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('academic_year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Student_trans.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        function ShowClasse(ele) {
            var GradeId = ele.value;
            // Creating the XMLHttpRequest object
            var request = new XMLHttpRequest();

            // Instantiating the request object
            request.open("GET", "{{ route('getclass', '') }}/" + GradeId);

            // Defining event listener for readystatechange event
            request.onreadystatechange = function() {
                // Check if the request is compete and was successful
                if (this.readyState === 4 && this.status === 200) {
                    var SelectClasses = document.querySelector("#class_id");
                    var allClasses = JSON.parse(this.responseText);
                    SelectClasses.innerHTML = '';
                    SelectClasses.innerHTML =
                        " <option selected disabled>{{ trans('Student_trans.choose') }}...</option>";
                    for (var id in allClasses) {
                        SelectClasses.innerHTML += `<option value='${allClasses[id]}'>${id}</option>`;
                    }
                }
            };
            // Sending the request to the server
            request.send();
        }
    </script>
    <script>
        function ShowSections(ele) {
            var ClasseId = ele.value;
            // Creating the XMLHttpRequest object
            var request = new XMLHttpRequest();

            // Instantiating the request object
            request.open("GET", "{{ route('getSections', '') }}/" + ClasseId);

            // Defining event listener for readystatechange event
            request.onreadystatechange = function() {
                // Check if the request is compete and was successful
                if (this.readyState === 4 && this.status === 200) {
                    var SelectSections = document.querySelector("#section_id");
                    var allSections = JSON.parse(this.responseText);
                    SelectSections.innerHTML = '';
                    for (var id in allSections) {
                        SelectSections.innerHTML += `<option value='${allSections[id]}'>${id}</option>`;
                    }
                }
            };
            // Sending the request to the server
            request.send();
        }
    </script>
@endsection
