@extends('layouts.main_selection')
@section('title')
    {{ trans('Selection_trans.title_selection') }}
@endsection
@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
        style="background-image: url('{{ asset('assets/images/sativa.png') }}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">

                <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                            {{ trans('Selection_trans.selection') }}</h3>
                        <div class="form-inline">
                            <a class="btn btn-default col-lg-3" title="{{ trans('Selection_trans.student') }}"
                                href="{{ route('login.selection', 'student') }}">
                                <img alt="user-img" width="100px;" src="{{ URL::asset('assets/images/student.png') }}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="{{ trans('Selection_trans.parent') }}"
                                href="{{ route('login.selection', 'parent') }}">
                                <img alt="user-img" width="100px;" src="{{ URL::asset('assets/images/parent.png') }}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="{{ trans('Selection_trans.teacher') }}"
                                href="{{ route('login.selection', 'teacher') }}">
                                <img alt="user-img" width="100px;" src="{{ URL::asset('assets/images/teacher.png') }}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="{{ trans('Selection_trans.admin') }}"
                                href="{{ route('login.selection', 'web') }}">
                                <img alt="user-img" width="100px;" src="{{ URL::asset('assets/images/admin.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
