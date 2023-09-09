@extends('layouts.master')
@section('title')
    {{ trans('Fees_invoice_trans.edit_fees_ivoice') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Fees_invoice_trans.edit_fees_ivoice') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Fees_invoice_trans.edit_fees_ivoice') }}
                    </li>
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
                    <a href="{{ route('feese_invoice.index') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Fees_trans.return') }}</a><br><br>
                    <form method="post" action="{{ route('feese_invoice.update', $feesInvoice->id) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="student_id" class="mr-sm-2">{{ trans('Student_trans.name_student') }}</label>
                                <input type="hidden" class="form-control" name="student_id"
                                    value="{{ $feesInvoice->student_id }}" required readonly>
                                <input type="text" class="form-control" name="student_name"
                                    value="{{ $feesInvoice->student->student_name }}" required readonly>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col">
                                <label for="feese_id" class="mr-sm-2">{{ trans('Fees_trans.fees_type') }}</label>
                                <select class="custom-select mr-sm-2" name="feese_id" required>
                                    <option value="{{ $feesInvoice->feese_id }}">{{ $feesInvoice->feese->name_fees }}
                                    </option>
                                    @foreach ($feese as $fees)
                                        <option value="{{ $fees->id }}">{{ $fees->name_fees }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="amount" class="mr-sm-2">{{ trans('Fees_trans.amount') }}</label>
                                <select class="custom-select mr-sm-2" name="amount" required data-id="5">
                                    <option value="{{ $feesInvoice->amount }}">{{ $feesInvoice->amount }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('Fees_trans.notes') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{ $feesInvoice->description }}</textarea>
                        </div>
                        <br>
                        <input type="hidden" name="school_grade_id" value="{{ $feesInvoice->school_grade_id }}">
                        <input type="hidden" name="classe_id" value="{{ $feesInvoice->classe_id }}">
                        <input type="hidden" name="section_id" value="{{ $feesInvoice->section_id }}">
                        <button type="submit" class="btn btn-primary">{{ trans('Fees_trans.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('select[name="feese_id"]').change(function() {
            var id = $(this).val();

            $.ajax({
                url: "{{ route('getAmountFeese', '') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="amount"]').empty();
                    $('select[name="amount"]').append(
                        "<option selected disabled >{{ trans('Fees_invoice_trans.choose') }}</option>"
                    );

                    $.each(data, function(key, value) {
                        $('select[name="amount"]').append(
                            '<option value="' + value + '">' + value +
                            '</option>');
                    });
                },
            })
        })
    </script>
@endsection
