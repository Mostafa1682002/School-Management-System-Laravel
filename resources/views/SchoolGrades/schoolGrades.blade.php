@extends('layouts.master')
@section('title')
    {{ trans('SchoolGrades_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('SchoolGrades_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_trans.schoolGrade') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('SchoolGrades_trans.page_title') }}</li>
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
                    @if (session('depend'))
                        <div class="alert  alert-danger" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ trans('SchoolGrades_trans.depend') }}
                        </div>
                    @endif
                    {{-- include Message --}}
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('SchoolGrades_trans.add_Grade') }}
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('SchoolGrades_trans.Name') }}</th>
                                    <th>{{ trans('SchoolGrades_trans.Notes') }}</th>
                                    <th>{{ trans('SchoolGrades_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $grade->name }}</td>
                                        <td>{{ $grade->notes }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $grade->id }}"
                                                title="{{ trans('SchoolGrades_trans.Edit') }}"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $grade->id }}"
                                                title="{{ trans('SchoolGrades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('SchoolGrades_trans.edit_Grade') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('schoolGrade.update', $grade->id) }}"
                                                        method="post">
                                                        @method('patch')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Name"
                                                                    class="mr-sm-2">{{ trans('SchoolGrades_trans.stage_name_ar') }}
                                                                    :</label>
                                                                <input id="Name" type="text" name="name"
                                                                    class="form-control"
                                                                    value="{{ $grade->getTranslation('name', 'ar') }}"
                                                                    required>
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $grade->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="Name_en"
                                                                    class="mr-sm-2">{{ trans('SchoolGrades_trans.stage_name_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $grade->getTranslation('name', 'en') }}"
                                                                    name="name_en" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('SchoolGrades_trans.Notes') }}
                                                                :</label>
                                                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->notes }}</textarea>
                                                        </div>
                                                        <br><br>

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

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('SchoolGrades_trans.delete_Grade') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('schoolGrade.destroy', $grade->id) }}"
                                                        method="post">
                                                        @method('Delete')
                                                        @csrf
                                                        {{ trans('SchoolGrades_trans.Warning_Grade') }}
                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $grade->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('SchoolGrades_trans.Close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('SchoolGrades_trans.Delete') }}</button>
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

        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('SchoolGrades_trans.add_Grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('schoolGrade.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('SchoolGrades_trans.stage_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="name" class="form-control"
                                        value="" required>
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('SchoolGrades_trans.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en" value="">

                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('SchoolGrades_trans.Notes') }}
                                    :</label>
                                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>

                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('SchoolGrades_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('SchoolGrades_trans.submit') }}</button>
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
@endsection
