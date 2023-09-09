@extends('layouts.master')
@section('title')
    {{ trans('Student_trans.student_details') }}
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Student_trans.student_details') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Student_trans.student_details') }}</li>
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
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02"
                                    aria-selected="true">{{ trans('Student_trans.student_details') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab"
                                    aria-controls="profile-02"
                                    aria-selected="false">{{ trans('Student_trans.attachments') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-03-tab" data-toggle="tab" href="#profile-03" role="tab"
                                    aria-controls="profile-03"
                                    aria-selected="false">{{ trans('Fees_trans.study_fees') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ trans('Student_trans.name_student') }}</th>
                                            <td>{{ $student->student_name }}</td>
                                            <th scope="row">{{ trans('Student_trans.email') }}</th>
                                            <td>{{ $student->email }}</td>
                                            <th scope="row">{{ trans('Student_trans.gender') }}</th>
                                            <td>{{ $student->gender->name_gender }}</td>
                                            <th scope="row">{{ trans('Student_trans.nationality') }}</th>
                                            <td>{{ $student->nationalitie->nationality_name }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ trans('Student_trans.grade') }}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{ trans('Student_trans.classroom') }}</th>
                                            <td>{{ $student->classe->class_name }}</td>
                                            <th scope="row">{{ trans('Student_trans.section') }}</th>
                                            <td>{{ $student->section->section_name }}</td>
                                            <th scope="row">{{ trans('Student_trans.date_of_birth') }}</th>
                                            <td>{{ $student->date_birth }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{ trans('Student_trans.parent') }}</th>
                                            <td>{{ $student->parent->name_father }}</td>
                                            <th scope="row">{{ trans('Student_trans.academic_year') }}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <form method="post" action="{{ route('studentAttachment.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="academic_year">{{ trans('Student_trans.attachments') }}
                                                : <span class="text-danger">*</span></label>
                                            <input type="file" accept="image/*" name="photos[]" multiple required>
                                            <input type="hidden" name="student_name" value="{{ $student->name_student }}">
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                        </div>
                                    </div>
                                    <br><br>
                                    <button type="submit" class="button button-border x-small">
                                        {{ trans('Student_trans.save') }}
                                    </button>
                                </form>
                                <br>
                                <table class="table center-aligned-table mb-0 table table-hover" style="text-align:center">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('Student_trans.filename') }}</th>
                                            <th scope="col">{{ trans('Student_trans.created_at') }}</th>
                                            <th scope="col">{{ trans('Student_trans.processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attachments as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $attachment->name_file }}</td>
                                                <td>{{ $attachment->created_at }}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="{{ route('downloadStudentAttachment', ['id' => $student->id, 'name' => $attachment->name_file]) }}"
                                                        role="button"><i class="fas fa-download"></i>&nbsp;
                                                        {{ trans('Student_trans.download') }}</a>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="modal" data-target="#Delete_img{{ $attachment->id }}"
                                                        title="{{ trans('Student_trans.delete') }}">{{ trans('Student_trans.delete') }}
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_img{{ $attachment->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">
                                                                {{ trans('Student_trans.delete_attachment') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('studentAttachment.destroy', $attachment->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $attachment->id }}">

                                                                <input type="hidden" name="student_name"
                                                                    value="{{ $attachment->student->student_name }}">
                                                                <input type="hidden" name="student_id"
                                                                    value="{{ $attachment->student->id }}">

                                                                <h5 style="font-family: 'Cairo', sans-serif;">
                                                                    {{ trans('Student_trans.delete_attachment_tilte') }}
                                                                </h5>
                                                                <input type="text" name="filename" readonly
                                                                    value="{{ $attachment->name_file }}"
                                                                    class="form-control">

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('Student_trans.close') }}</button>
                                                                    <button
                                                                        class="btn btn-danger">{{ trans('Student_trans.delete') }}</button>
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

                            <div class="tab-pane fade" id="profile-03" role="tabpanel" aria-labelledby="profile-03-tab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')
@endsection
