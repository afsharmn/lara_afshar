@extends('site::layouts.auth')

@section('content')

    <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">

        <a class="text-black text-decoration-none h3" href="{{ route('site.index') }}">{{ config('app.name') }}</a>

        <div class="card auth-card">

            <div class="card-header fw-bold">
                @lang('login')
            </div>

            <div class="card-body">

                <form action="{{ route('site.login') }}" method="post">
                    @csrf

                    @php($name = 'email')
                    <x-bootstrap-5.inputs.input
                        type="text"
                        :name="$name"
                        :label="__($name)"
                        containerClass="mb-3"
                        maxlength="255"
                        required
                    />

                    @php($name = 'password')
                    <x-bootstrap-5.inputs.input
                        type="password"
                        :name="$name"
                        :label="__($name)"
                        containerClass="mb-3"
                        maxlength="255"
                        required
                    />

                    <div class="d-flex justify-content-between align-items-center">

                        @php($name = 'remember')
                        <x-bootstrap-5.inputs.checkbox
                            :name="$name"
                            :label="__($name)"
                            containerClass="mb-3"
                        />


                        <x-bootstrap-5.buttons.button
                            title="{{ __('login') }}"
                            containerClass="mb-3"
                            class="btn-primary"
                            submit
                        />

                    </div>

                </form>
            </div>

        </div>

    </div>

@endsection

