@extends('layouts.master')
@section('title')
    {{ trans('Fees_trans.study_fees') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Fees_trans.study_fees') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Accounts') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Fees_trans.study_fees') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {{-- include Message --}}
                    @include('layouts.message')
                    {{-- include Message --}}
                    <a href="{{ route('feese.create') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Fees_trans.add_new_fees') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Fees_trans.name') }}</th>
                                    <th>{{ trans('Fees_trans.amount') }}</th>
                                    <th>{{ trans('Fees_trans.grade') }}</th>
                                    <th>{{ trans('Fees_trans.classroom') }}</th>
                                    <th>{{ trans('Fees_trans.academic_year') }}</th>
                                    <th>{{ trans('Fees_trans.fees_type') }}</th>
                                    <th>{{ trans('Fees_trans.notes') }}</th>
                                    <th>{{ trans('Fees_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeses as $feese)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $feese->name_fees }}</td>
                                        <td>{{ $feese->amount }}</td>
                                        <td>{{ $feese->grade->name }}</td>
                                        <td>{{ $feese->classe->class_name }}</td>
                                        <td>{{ $feese->academic_year }}</td>
                                        <td>
                                            @if ($feese->fees_type == 1)
                                                {{ trans('Fees_trans.studyfees') }}
                                            @elseif ($feese->fees_type == 2)
                                                {
                                                {{ trans('Fees_trans.busfees') }}
                                                }
                                            @endif
                                        </td>
                                        <td>{{ $feese->notes }}</td>
                                        <td>
                                            <a href="{{ route('feese.edit', $feese->id) }}" class="btn btn-info btn-sm"
                                                role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#Delete_Feese{{ $feese->id }}"
                                                title="{{ trans('Fees_trans.delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                            <a href="{{ route('feese.show', $feese->id) }}" class="btn btn-warning btn-sm"
                                                role="button" aria-pressed="true"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Deleted inFormation Student -->
                                    <div class="modal fade" id="Delete_Feese{{ $feese->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('Fees_trans.delete_fees') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('feese.destroy', $feese->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $feese->id }}">
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Fees_trans.warning_fees') }}</h5>
                                                        <input type="text" readonly value="{{ $feese->name_fees }}"
                                                            class="form-control">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Fees_trans.close') }}</button>
                                                            <button
                                                                class="btn btn-danger">{{ trans('Fees_trans.delete') }}</button>
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
    <!-- row closed -->
@endsection
@section('js')
@endsection
