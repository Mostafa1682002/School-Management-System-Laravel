@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.add_promotion') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Student_trans.add_promotion') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.add_promotion') }}</li>
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
                    <h6 style="color: red;font-family: Cairo">{{ trans('Student_trans.old_grade') }}</h6><br>
                    <form method="post" action="{{ route('promotion.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="from_grade">{{ trans('Student_trans.old_grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="from_grade" id="from_grade"
                                    onchange="ShowClasse(this)" required>
                                    <option selected disabled>{{ trans('Student_trans.choose') }}...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('from_garde')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="from_classe">{{ trans('Student_trans.old_classroom') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="from_classe" id="from_classe"
                                    onchange="ShowSections(this)" required>
                                </select>
                                @error('from_classe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="from_section">{{ trans('Student_trans.old_section') }} : <span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="from_section" id="from_section" required>
                                </select>
                                @error('from_section')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{ trans('Student_trans.old_academic_year') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="from_academic_year">
                                        <option selected disabled>{{ trans('Student_trans.choose') }}...</option>
                                        @php
                                            $current_year = date('Y');
                                        @endphp
                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br>
                        <h6 style="color: red;font-family: Cairo">{{ trans('Student_trans.new_grade') }}</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="to_grade">{{ trans('Student_trans.new_grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="to_grade" id="to_grade"
                                    onchange="toClasse(this)">
                                    <option selected disabled>{{ trans('Student_trans.choose') }}...</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('to_grade')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="to_classe">{{ trans('Student_trans.new_classroom') }}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="to_classe" id="to_classe"
                                    onchange="toSections(this)">
                                </select>
                                @error('to_classe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="to_section">{{ trans('Student_trans.new_section') }} :
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="custom-select mr-sm-2" name="to_section" id="to_section">
                                </select>
                                @error('to_section')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{ trans('Student_trans.new_academic_year') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="to_academic_year">
                                        <option selected disabled>{{ trans('Student_trans.choose') }}...</option>
                                        @php
                                            $current_year = date('Y');
                                        @endphp
                                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
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
                    var SelectClasses = document.querySelector("#from_classe");
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

        function toClasse(ele) {
            var GradeId = ele.value;
            // Creating the XMLHttpRequest object
            var request = new XMLHttpRequest();

            // Instantiating the request object
            request.open("GET", "{{ route('getclass', '') }}/" + GradeId);

            // Defining event listener for readystatechange event
            request.onreadystatechange = function() {
                // Check if the request is compete and was successful
                if (this.readyState === 4 && this.status === 200) {
                    var SelectClasses = document.querySelector("#to_classe");
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
                    var SelectSections = document.querySelector("#from_section");
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

        function toSections(ele) {
            var ClasseId = ele.value;
            // Creating the XMLHttpRequest object
            var request = new XMLHttpRequest();

            // Instantiating the request object
            request.open("GET", "{{ route('getSections', '') }}/" + ClasseId);

            // Defining event listener for readystatechange event
            request.onreadystatechange = function() {
                // Check if the request is compete and was successful
                if (this.readyState === 4 && this.status === 200) {
                    var SelectSections = document.querySelector("#to_section");
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
