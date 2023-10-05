@extends('layouts.main_selection')
@section('title')
    {{ trans('Selection_trans.title_login') }}
@endsection
@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
        style="background-image: url('{{ asset('assets/images/sativa.png') }}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">

                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        @if ($type == 'student')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                                {{ trans('Selection_trans.title_login') }} {{ trans('Selection_trans.student') }}
                            </h3>
                        @elseif($type == 'parent')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                                {{ trans('Selection_trans.title_login') }} {{ trans('Selection_trans.parent') }}
                            </h3>
                        @elseif($type == 'teacher')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                                {{ trans('Selection_trans.title_login') }} {{ trans('Selection_trans.teacher') }}
                            </h3>
                        @else
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">
                                {{ trans('Selection_trans.title_login') }} {{ trans('Selection_trans.admin') }}
                            </h3>
                        @endif


                        {{-- include Message --}}

                        @if (session('invalid'))
                            <div class="alert alert-danger" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ trans('message.invalid') }}
                            </div>
                        @endif
                        {{-- include Message --}}
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group col mb-20">
                                <label class="mb-10" for="email">
                                    {{ trans('Selection_trans.email') }}<span class="text-danger">*</span>
                                </label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <input type="hidden" value="{{ $type }}" name="type">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col mb-20">
                                <label class="mb-10" for="Password">
                                    {{ trans('Selection_trans.password') }} <span class="text-danger">*</span>
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group col">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="remember" id="two"
                                        value="1" />
                                    <label for="two">{{ trans('Selection_trans.remember') }}</label>
                                    <a href="#" class="float-right">{{ trans('Selection_trans.forget') }}</a>
                                </div>
                            </div>
                            {{-- <button class="button"><span>Login</span><i class="fa fa-check"></i></button> --}}
                            <button class="button"><span>{{ trans('Selection_trans.login') }}</span><i
                                    class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
