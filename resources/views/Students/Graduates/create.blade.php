@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.graduate_student') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Student_trans.graduate_student') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.graduate_student') }}</li>
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
                    <br>
                    <form method="post" action="{{ route('graduated.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="grade">{{ trans('Student_trans.grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade" id="grade"
                                    onchange="ShowClasse(this)" required>
                                    <option selected disabled>{{ trans('Student_trans.choose') }}...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('garde')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="classe">{{ trans('Student_trans.classroom') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classe" id="classe"
                                    onchange="ShowSections(this)" required>
                                </select>
                                @error('classe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="section">{{ trans('Student_trans.old_section') }} : <span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="section" id="section" required>
                                </select>
                                @error('section')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('Student_trans.save') }}</button>
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
                    var SelectClasses = document.querySelector("#classe");
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
                    var SelectSections = document.querySelector("#section");
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
