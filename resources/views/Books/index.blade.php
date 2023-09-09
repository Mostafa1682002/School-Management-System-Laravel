@extends('layouts.master')
@section('title')
    {{ trans('Books_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Books_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Books') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Books_trans.page_title') }}</li>
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
                    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Books_trans.add_page_title') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Books_trans.file_name') }}</th>
                                    <th>{{ trans('Books_trans.subject') }}</th>
                                    <th>{{ trans('Books_trans.name_teacher') }}</th>
                                    <th>{{ trans('Books_trans.grade') }}</th>
                                    <th>{{ trans('Books_trans.classroom') }}</th>
                                    <th>{{ trans('Books_trans.term') }}</th>
                                    <th>{{ trans('Books_trans.academic_year') }}</th>
                                    <th>{{ trans('Books_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $book->file_name }}</td>
                                        <td>{{ $book->subject->subject_name }}</td>
                                        <td>{{ $book->subject->teacher->name_teacher }}</td>
                                        <td>{{ $book->grade->name }}</td>
                                        <td>{{ $book->classe->class_name }}</td>
                                        <td>{{ $book->term->name }}</td>
                                        <td>{{ $book->academic_year }}</td>
                                        <td>
                                            <a href="{{ route('books.show', $book->id) }}" target="_blank"
                                                class="btn btn-primary btn-sm" role="button" aria-pressed="true"
                                                title="{{ trans('Books_trans.download') }}"><i style="color: #fff"
                                                    class="far fa-download "></i></a>
                                            <a href="{{ asset("uploades/books/$book->id/$book->file_name") }}"
                                                target="_blank" class="btn btn-warning btn-sm" role="button"
                                                aria-pressed="true" title="{{ trans('Books_trans.show_book') }}"><i
                                                    style="color: #fff" class="far fa-eye "></i></a>
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info btn-sm"
                                                role="button" aria-pressed="true"
                                                title="{{ trans('Books_trans.edit') }}"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_book{{ $book->id }}"
                                                title="{{ trans('Books_trans.delete') }}"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_book{{ $book->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('Books_trans.delete_book') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> {{ trans('Books_trans.warning_book') }}</p>
                                                        <input type="text" readonly value="{{ $book->file_name }}"
                                                            class="form-control">
                                                        <input type="hidden" name="id" value="{{ $book->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Books_trans.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('Books_trans.delete') }}</button>
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
