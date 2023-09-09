@extends('layouts.master')
@section('title')
    {{ trans('Subject_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Subject_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Subjects') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Subject_trans.page_title') }}</li>
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
                    <a href="{{ route('subject.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Subject_trans.add_page_title') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Subject_trans.subject_name') }}</th>
                                    <th>{{ trans('Subject_trans.grade') }}</th>
                                    <th>{{ trans('Subject_trans.classroom') }}</th>
                                    <th>{{ trans('Subject_trans.name_teacher') }}</th>
                                    <th>{{ trans('Subject_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $subject->subject_name }}</td>
                                        <td>{{ $subject->grade->name }}</td>
                                        <td>{{ $subject->classe->class_name }}</td>
                                        <td>{{ $subject->teacher->name_teacher }}</td>
                                        <td>
                                            <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-info btn-sm"
                                                role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_subject{{ $subject->id }}"
                                                title="{{ trans('Subject_trans.delete') }}"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_subject{{ $subject->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('subject.destroy', $subject->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('Subject_trans.delete_subject') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('Subject_trans.warning_subject') }}</p>
                                                        <input type="text" readonly value="{{ $subject->subject_name }}"
                                                            class="form-control">
                                                        <input type="hidden" name="id" value="{{ $subject->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Subject_trans.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('Subject_trans.delete') }}</button>
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
