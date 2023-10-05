@extends('layouts.master')
@section('title')
    {{ trans('Sections_trans.page_title') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Sections_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.sections') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Sections_trans.page_title') }}</li>
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
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Sections_trans.add_section') }}</a>
                    <br>
                    <br>
                    <div class="accordion gray plus-icon round">
                        @foreach ($grades as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('Sections_trans.name_section') }}
                                                                    </th>
                                                                    <th>{{ trans('Sections_trans.name_classe') }}</th>
                                                                    <th>{{ trans('Sections_trans.name_teacher') }}</th>
                                                                    <th>{{ trans('Sections_trans.status') }}</th>
                                                                    <th>{{ trans('Sections_trans.processes') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $i = 0;
                                                                @endphp
                                                                @foreach ($grade->sections as $section)
                                                                    <tr>
                                                                        <td>{{ ++$i }}</td>
                                                                        <td>{{ $section->section_name }}</td>
                                                                        <td>{{ $section->classe->class_name }}</td>
                                                                        <td>
                                                                            @foreach ($section->teachers as $teacher)
                                                                                <p>{{ $teacher->name_teacher }}</p>
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @if ($section->status === 1)
                                                                                <label
                                                                                    class="badge badge-success">{{ trans('Sections_trans.status_section_ac') }}</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">{{ trans('Sections_trans.status_section_no') }}</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>

                                                                            <a href="#"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $section->id }}">{{ trans('Sections_trans.edit') }}</a>
                                                                            <a href="#"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $section->id }}">{{ trans('Sections_trans.delete') }}</a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade" id="edit{{ $section->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections_trans.edit_section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('sections.update', $section->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="section_name_ar"
                                                                                                    class="form-control"
                                                                                                    value="{{ $section->getTranslation('section_name', 'ar') }}">
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="section_name_en"
                                                                                                    class="form-control"
                                                                                                    value="{{ $section->getTranslation('section_name', 'en') }}">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $section->id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('sections_trans.name_grade') }}</label>
                                                                                            <select name="school_grade_id"
                                                                                                class="custom-select"
                                                                                                onclick="ShowClasseE(this)">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{ $section->school_grade_id }}">
                                                                                                    {{ $section->school_grade->name }}
                                                                                                </option>
                                                                                                @foreach ($grades as $grade)
                                                                                                    <option
                                                                                                        value="{{ $grade->id }}">
                                                                                                        {{ $grade->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('sections_trans.name_classe') }}</label>
                                                                                            <select name="class_id"
                                                                                                id="e_class_id"
                                                                                                class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $section->classe->id }}">
                                                                                                    {{ $section->classe->class_name }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('Sections_trans.name_teacher') }}</label>
                                                                                            <select multiple
                                                                                                name="teacher_id[]"
                                                                                                class="form-control"
                                                                                                id="exampleFormControlSelect2">
                                                                                                @php $arr = [];@endphp
                                                                                                @foreach ($section->teachers as $teacher)
                                                                                                    @php array_push($arr ,$teacher->id ) @endphp
                                                                                                @endforeach
                                                                                                @foreach ($teachers as $teacher)
                                                                                                    <option
                                                                                                        value="{{ $teacher->id }}"
                                                                                                        {{ in_array($teacher->id, $arr) ? 'selected' : '' }}>
                                                                                                        {{ $teacher->name_teacher }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <div class="form-check">
                                                                                                <input type="radio"
                                                                                                    @if ($section->status === 1) checked @endif
                                                                                                    class="form-check-input"
                                                                                                    name="status"
                                                                                                    id="exampleCheck1"
                                                                                                    value="1">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('sections_trans.status_section_ac') }}</label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input type="radio"
                                                                                                    @if ($section->status === 0) checked @endif
                                                                                                    class="form-check-input"
                                                                                                    name="status"
                                                                                                    id="exampleCheck1"
                                                                                                    value="0">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('sections_trans.status_section_no') }}</label>
                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">{{ trans('sections_trans.close') }}</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-success">{{ trans('sections_trans.edit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $section->id }}" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('sections_trans.delete_section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('sections.destroy', $section->id) }}"
                                                                                        method="post">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        {{ trans('sections_trans.warning_section') }}
                                                                                        <input id="id"
                                                                                            type="hidden" name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $section->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">{{ trans('Sections_trans.close') }}</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--اضافة قسم جديد -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                {{ trans('Sections_trans.add_section') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('sections.store') }}" method="POST">
                                @csrf
                                <div class="row p-2">
                                    <div class="col">
                                        <label for="Namear"
                                            class="control-label">{{ trans('Sections_trans.section_name_ar') }}</label>
                                        <input type="text" name="section_name_ar" class="form-control" id="Namear"
                                            placeholder="{{ trans('Sections_trans.section_name_ar') }}">
                                    </div>

                                    <div class="col">
                                        <label for="Nameen"
                                            class="control-label">{{ trans('Sections_trans.section_name_en') }}</label>
                                        <input type="text" name="section_name_en" class="form-control" id="Nameen"
                                            placeholder="{{ trans('Sections_trans.section_name_en') }}">
                                    </div>

                                </div>
                                <br>


                                <div class="col">
                                    <label for="inputName"
                                        class="control-label">{{ trans('Sections_trans.name_grade') }}</label>
                                    <select name="school_grade_id" class="custom-select" onchange="ShowClasse(this)"
                                        required>
                                        <!--placeholder-->
                                        <option value="" selected disabled>
                                            {{ trans('Sections_trans.select_grade') }}
                                        </option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}"> {{ $grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="col">
                                    <label for="inputName"
                                        class="control-label">{{ trans('Sections_trans.name_classe') }}</label>
                                    <select name="class_id" class="custom-select" id="class_id">
                                    </select>
                                </div>
                                <br>
                                <div class="col">
                                    <label for="inputName"
                                        class="control-label">{{ trans('Sections_trans.name_teacher') }}</label>
                                    <select multiple name="teacher_id[]" class="form-control"
                                        id="exampleFormControlSelect2">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name_teacher }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Sections_trans.close') }}</button>
                            <button type="submit" class="btn btn-success">{{ trans('Sections_trans.submit') }}</button>
                        </div>
                        </form>
                    </div>
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
        function ShowClasseE(ele) {
            var GradeId = ele.value;
            // Creating the XMLHttpRequest object
            var request = new XMLHttpRequest();

            // Instantiating the request object
            request.open("GET", "{{ route('getclass', '') }}/" + GradeId);

            // Defining event listener for readystatechange event
            request.onreadystatechange = function() {
                // Check if the request is compete and was successful
                if (this.readyState === 4 && this.status === 200) {
                    var SelectClasses = document.querySelector("#e_class_id");
                    var allClasses = JSON.parse(this.responseText);
                    SelectClasses.innerHTML = '';
                    for (var id in allClasses) {
                        SelectClasses.innerHTML += `<option value='${allClasses[id]}'>${id}</option>`;
                    }
                }
            };
            // Sending the request to the server
            request.send();
        }
    </script>
@endsection
