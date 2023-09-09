@extends('layouts.master')
@section('title')
    {{ trans('Teacher_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Teacher_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Teachers') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Teacher_trans.page_title') }}</li>
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
                    <a href="{{ route('teacher.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Teacher_trans.add_teacher') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Teacher_trans.name_teacher') }}</th>
                                    <th>{{ trans('Teacher_trans.email') }}</th>
                                    <th>{{ trans('Teacher_trans.joining_date') }}</th>
                                    <th>{{ trans('Teacher_trans.specialization') }}</th>
                                    <th>{{ trans('Teacher_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $teacher->name_teacher }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->created_at }}</td>
                                        <td>{{ $teacher->specialization->name_specializ }}</td>
                                        <td>
                                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-info btn-sm"
                                                role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_Teacher{{ $teacher->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_Teacher{{ $teacher->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('Teacher_trans.delete_teacher') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('Teacher_trans.warning_teacher') }}</p>
                                                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Teacher_trans.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('Teacher_trans.delete') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
