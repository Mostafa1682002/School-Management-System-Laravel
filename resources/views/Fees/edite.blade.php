@extends('layouts.master')
@section('title')
    {{ trans('Fees_trans.edite_fees') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Fees_trans.edite_fees') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Accounts') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Fees_trans.edite_fees') }}</li>
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
                    <a href="{{ route('feese.index') }}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('Fees_trans.return') }}</a><br><br>
                    <form method="post" action="{{ route('feese.update', $feese->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees_trans.name_ar') }}</label>
                                <input type="text" value="{{ $feese->getTranslation('name_fees', 'ar') }}" name="name_ar"
                                    class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees_trans.name_en') }}</label>
                                <input type="text" value="{{ $feese->getTranslation('name_fees', 'en') }}"
                                    name="name_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('Fees_trans.amount') }}</label>
                                <input type="number" value="{{ $feese->amount }}" name="amount" class="form-control">
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="school_grade_id">{{ trans('Fees_trans.grade') }}</label>
                                <select class="custom-select mr-sm-2" id="school_grade_id" name="school_grade_id">
                                    <option value="{{ $feese->school_grade_id }}">{{ $feese->grade->name }}</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="classe_id">{{ trans('Fees_trans.classroom') }}</label>
                                <select class="custom-select mr-sm-2" id="classe_id" name="classe_id">
                                    <option value="{{ $feese->classe_id }}">{{ $feese->classe->class_name }}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="academic_year">{{ trans('Fees_trans.academic_year') }}</label>
                                <select class="custom-select mr-sm-2" id="academic_year" name="academic_year">
                                    <option value="{{ $feese->academic_year }}">{{ $feese->academic_year }}</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('Fees_trans.fees_type') }}</label>
                                <select class="custom-select mr-sm-2" name="fees_type">
                                    @if ($feese->fees_type == 1)
                                        <option value="1">{{ trans('Fees_trans.studyfees') }}</option>
                                    @elseif ($feese->fees_type == 2)
                                        <option value="2">{{ trans('Fees_trans.busfees') }}</option>
                                    @endif
                                    <option value="1">{{ trans('Fees_trans.studyfees') }}</option>
                                    <option value="2">{{ trans('Fees_trans.busfees') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">{{ trans('Fees_trans.notes') }}</label>
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="4">{{ $feese->notes }}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{ trans('Fees_trans.edit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $('select[name="school_grade_id"]').on('change', function() {
            var school_grade_id = $(this).val();
            if (school_grade_id) {
                $.ajax({
                    url: "{{ route('getclass', '') }}/" + school_grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classe_id"]').empty();
                        $('select[name="classe_id"]').append(
                            "<option selected disabled >{{ trans('Fees_trans.choose') }}</option>"
                        );
                        $.each(data, function(key, value) {
                            $('select[name="classe_id"]').append(
                                '<option value="' + value + '">' + key +
                                '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    </script>
@endsection
