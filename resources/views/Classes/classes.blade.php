@extends('layouts.master')
@section('title')
    {{ trans('Classes_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Classes_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.classes') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Classes_trans.page_title') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {{-- include Message --}}
                    @include('layouts.message')
                    @if (session('notSelect'))
                        <div class="alert  alert-danger" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ trans('Classes_trans.notSelect') }}
                        </div>
                    @endif
                    {{-- include Message --}}
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Classes_trans.add_class') }}
                    </button>
                    <button type="button" id="Select" class="button x-small" data-toggle="modal"
                        data-target="#DeleteSelected">
                        {{ trans('Classes_trans.DeleteSelected') }}
                    </button>



                    <div class="btn-group mb-1">
                        <button type="button" class=" dropdown-toggle button x-small" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ trans('Classes_trans.filter') }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" rel="alternate" hreflang="{{ App::getLocale() }}"
                                href="{{ route('classes.index') }}">
                                {{ trans('Classes_trans.all') }}
                            </a>
                            @foreach ($grades as $grade)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ App::getLocale() }}"
                                    href="{{ route('classes.index') }}?filter={{ $grade->id }}">
                                    {{ $grade->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="parent"></th>
                                    <th>#</th>
                                    <th>{{ trans('Classes_trans.Name_class') }}</th>
                                    <th>{{ trans('Classes_trans.Name_grade') }}</th>
                                    <th>{{ trans('Classes_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $classe)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="delete[]" id="childdelete"
                                                value="{{ $classe->id }}">
                                        </td>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>{{ $classe->class_name }}</td>
                                        <td>{{ $classe->grade->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $classe->id }}"
                                                title="{{ trans('Classes_trans.Edit') }}"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $classe->id }}"
                                                title="{{ trans('Classes_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Classe -->
                                    <div class="modal fade" id="edit{{ $classe->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('Classes_trans.edit_class') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('classes.update', $classe->id) }}"
                                                        method="post">
                                                        @method('patch')
                                                        @csrf
                                                        <div class="repeater">
                                                            <div data-repeater-list="List_classes">
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                class="mr-sm-2">{{ trans('Classes_trans.class_name_ar') }}
                                                                                :</label>
                                                                            <input id="Name" type="text"
                                                                                name="class_name" class="form-control"
                                                                                value="{{ $classe->getTranslation('class_name', 'ar') }}"
                                                                                required>
                                                                            <input id="id" type="hidden"
                                                                                name="id" class="form-control"
                                                                                value="{{ $classe->id }}">
                                                                        </div>
                                                                        <div class="col">
                                                                            <label for="Name_en"
                                                                                class="mr-sm-2">{{ trans('Classes_trans.class_name_en') }}
                                                                                :</label>
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $classe->getTranslation('class_name', 'en') }}"
                                                                                name="class_name_en" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col ">
                                                                            <label for="shoolgarde_id"
                                                                                class="mr-sm-2">{{ trans('Classes_trans.Name_grade') }}
                                                                                :</label>
                                                                            <div class="box">
                                                                                <select class="form-control"
                                                                                    name="shoolgarde_id">
                                                                                    <option
                                                                                        value="{{ $classe->schoolgrade_id }}">
                                                                                        {{ $classe->grade->name }}
                                                                                    </option>
                                                                                    @foreach ($grades as $grade)
                                                                                        <option
                                                                                            value="{{ $grade->id }}">
                                                                                            {{ $grade->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('SchoolGrades_trans.Close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-success">{{ trans('SchoolGrades_trans.Edit') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete_modal_Class -->
                                    <div class="modal fade" id="delete{{ $classe->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('Classes_trans.delete_class') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('classes.destroy', $classe->id) }}"
                                                        method="post">
                                                        @method('Delete')
                                                        @csrf
                                                        {{ trans('Classes_trans.Warning_class') }}
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $classe->id }}">

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Classes_trans.Close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('Classes_trans.Delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- add_modal_class -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('Classes_trans.add_class') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class=" row mb-30" action="{{ route('classes.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="List_classes">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="class_name"
                                                        class="mr-sm-2">{{ trans('Classes_trans.class_name_ar') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="class_name" />
                                                </div>
                                                <div class="col">
                                                    <label for="class_name_en"
                                                        class="mr-sm-2">{{ trans('Classes_trans.class_name_en') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="class_name_en" />
                                                </div>
                                                <div class="col">
                                                    <label for="shoolgarde_id"
                                                        class="mr-sm-2">{{ trans('Classes_trans.Name_grade') }}
                                                        :</label>

                                                    <div class="box">
                                                        <select class="fancyselect" name="shoolgarde_id">
                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}">{{ $grade->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="Name_en"
                                                        class="mr-sm-2">{{ trans('Classes_trans.Processes') }}
                                                        :</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                                        type="button" value="{{ trans('Classes_trans.Delete') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button"
                                                value="{{ trans('Classes_trans.add_row') }}" />
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Classes_trans.Close') }}</button>
                                        <button type="submit"
                                            class="btn btn-success">{{ trans('Classes_trans.submit') }}</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- delete_modal_Class  Selected-->
    <div class="modal fade" id="DeleteSelected" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('Classes_trans.DeleteSelected') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('classes.deleteSelect') }}" method="post">
                        @method('Delete')
                        @csrf
                        {{ trans('Classes_trans.Warning_class') }}
                        <input id="ids" type="hidden" name="ids" class="form-control" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('Classes_trans.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('Classes_trans.Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    <!-- row closed -->
@endsection
@section('js')
    <script>
        let parentCheckbox = document.querySelector('#parent');

        let childCheckbox = document.querySelectorAll('#childdelete');

        parentCheckbox.onchange = () => {
            if (parentCheckbox.checked) {
                childCheckbox.forEach(element => {
                    element.setAttribute('checked', true)
                });
            } else {
                childCheckbox.forEach(element => {
                    element.removeAttribute('checked')
                });
            }
        }

        let buttonDleteSelect = document.querySelector('#Select');
        buttonDleteSelect.onclick = () => {
            let selected = [];
            childCheckbox.forEach((e) => {
                if (e.checked) {
                    selected.push(e.value);
                }
            })
            document.querySelector('#ids').value = selected;
        }
    </script>
@endsection
