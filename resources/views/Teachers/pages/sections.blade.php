@extends('layouts.master')
@section('title')
    {{ trans('Sections_trans.page_title') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Sections_trans.page_title') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.sections') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Sections_trans.page_title') }}</li>
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
                    <br>
                    <div class="accordion gray plus-icon round">
                        @foreach ($grades as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                            <tr class="text-dark">
                                                                <th>#</th>
                                                                <th>{{ trans('Sections_trans.name_section') }}
                                                                </th>
                                                                <th>{{ trans('Sections_trans.name_classe') }}</th>
                                                                <th>{{ trans('Sections_trans.name_teacher') }}</th>
                                                                <th>{{ trans('Sections_trans.status') }}</th>
                                                                <th>{{ trans('Sections_trans.num_students') }}</th>
                                                                <th>{{ trans('Sections_trans.students') }}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($sections as $section)
                                                                @if(in_array($section->school_grade->id,[$grade->id]))
                                                                    <tr>
                                                                        <td>{{ $loop->index+1 }}</td>
                                                                        <td>{{ $section->section_name }}</td>
                                                                        <td>{{ $section->classe->class_name }}</td>
                                                                        <td>
                                                                            @foreach ($section->teachers as $teacher)
                                                                                <p>{{ $teacher->name_teacher }}</p>
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @if ($section->status === 1)
                                                                                <label
                                                                                    class="badge badge-success">{{ trans('Sections_trans.status_section_ac') }}</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">{{ trans('Sections_trans.status_section_no') }}</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>{{count($section->students)}}</td>
                                                                        <td>
                                                                            <a href="{{route('teacher.students')}}?section_id={{$section->id}}" class="btn btn-success btn-sm" role="button"
                                                                               aria-pressed="true">{{ trans('Sections_trans.list_students') }}</a>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    @php continue; @endphp
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
