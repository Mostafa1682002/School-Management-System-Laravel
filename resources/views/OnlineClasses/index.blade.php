@extends('layouts.master')
@section('title')
    {{ trans('OnlineClasses_trans.page_title') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('OnlineClasses_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_trans.Onlineclasses') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('OnlineClasses_trans.page_title') }}</li>
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
                    <a href="{{ route('online-classes.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('OnlineClasses_trans.add_page_title') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('OnlineClasses_trans.topic') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.subject_name') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.name_teacher') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.grade') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.classroom') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.section') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.start_time') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.start_url') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.join_link') }}</th>
                                    <th>{{ trans('OnlineClasses_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($onlineClasses as $onlineClasse)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $onlineClasse->topic }}</td>
                                        <td>{{ $onlineClasse->subject->subject_name }}</td>
                                        <td>{{ $onlineClasse->subject->teacher->name_teacher }}</td>
                                        <td>{{ $onlineClasse->grade->name }}</td>
                                        <td>{{ $onlineClasse->classe->class_name }}</td>
                                        <td>{{ $onlineClasse->section->section_name }}</td>
                                        <td>{{ $onlineClasse->start_time }}</td>
                                        <td><a href="{{ $onlineClasse->start_url }}" target="_blank"
                                                class="text-danger">{{ trans('OnlineClasses_trans.start') }}</a></td>
                                        <td><a href="{{ $onlineClasse->join_url }}" target="_blank"
                                                class="text-danger">{{ trans('OnlineClasses_trans.join') }}</a></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete_online{{ $onlineClasse->id }}"
                                                title="{{ trans('OnlineClasses_trans.delete') }}"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_online{{ $onlineClasse->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('online-classes.destroy', $onlineClasse->id) }}"
                                                method="post">
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
                                                        <p> {{ trans('OnlineClasses_trans.warning_online') }}</p>
                                                        <input type="text" readonly value="{{ $onlineClasse->topic }}"
                                                            class="form-control">
                                                        <input type="hidden" name="id"
                                                            value="{{ $onlineClasse->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('OnlineClasses_trans.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('OnlineClasses_trans.delete') }}</button>
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
