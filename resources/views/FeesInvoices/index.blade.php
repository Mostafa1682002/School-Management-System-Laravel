@extends('layouts.master')
@section('title')
    {{ trans('Fees_invoice_trans.fees_ivoice') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Fees_invoice_trans.fees_ivoice') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Accounts') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Fees_invoice_trans.fees_ivoice') }}</li>
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

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Fees_trans.student_name') }}</th>
                                    <th>{{ trans('Fees_trans.fees_type') }}</th>
                                    <th>{{ trans('Fees_trans.amount') }}</th>

                                    <th>{{ trans('Fees_trans.grade') }}</th>
                                    <th>{{ trans('Fees_trans.classroom') }}</th>

                                    <th>{{ trans('Fees_trans.notes') }}</th>
                                    <th>{{ trans('Fees_trans.processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feesInvoices as $feesInvoice)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $feesInvoice->student->student_name }}</td>
                                        <td>
                                            @if ($feesInvoice->feese->fees_type == 1)
                                                {{ trans('Fees_trans.studyfees') }}
                                            @elseif ($feesInvoice->feese->fees_type == 2)
                                                {{ trans('Fees_trans.busfees') }}
                                            @endif
                                        </td>

                                        <td>{{ $feesInvoice->amount }}</td>
                                        <td>{{ $feesInvoice->grade->name }}</td>
                                        <td>{{ $feesInvoice->classe->class_name }}</td>
                                        <td>{{ $feesInvoice->description }}</td>
                                        <td>
                                            <a href="{{ route('feese_invoice.edit', $feesInvoice->id) }}"
                                                class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#Delete_Feese{{ $feesInvoice->id }}"
                                                title="{{ trans('Fees_trans.delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                            <a href="" class="btn btn-warning btn-sm" role="button"
                                                aria-pressed="true"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Deleted inFormation Student -->
                                    <div class="modal fade" id="Delete_Feese{{ $feesInvoice->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('Fees_invoice_trans.delete_fees_invoice') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('feese_invoice.destroy', $feesInvoice->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id"
                                                            value="{{ $feesInvoice->id }}">
                                                        <h5 style="font-family: 'Cairo', sans-serif;">
                                                            {{ trans('Fees_invoice_trans.warning_fees_invoice') }}</h5>
                                                        <div class="row p-2">
                                                            <div class="col">
                                                                <label for="Namear"
                                                                    class="control-label">{{ trans('Fees_trans.fees_type') }}</label>
                                                                <input type="text" readonly
                                                                    value="{{ $feesInvoice->feese->name_fees }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row p-2">
                                                            <div class="col">
                                                                <label for="Namear"
                                                                    class="control-label">{{ trans('Fees_trans.student_name') }}</label>
                                                                <input type="text" readonly
                                                                    value="{{ $feesInvoice->student->student_name }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>



                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Fees_invoice_trans.close') }}</button>
                                                            <button
                                                                class="btn btn-danger">{{ trans('Fees_invoice_trans.delete') }}</button>
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
