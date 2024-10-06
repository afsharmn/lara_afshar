<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ config()->get('app.diraction') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite('resources/scss/admin/admin.scss')

</head>
<body>

@if($errors->any())
    @foreach($errors->all() as $error)
        <x-toastify.error message="{{ $error }}"/>
    @endforeach
@endif


@if(session()->has('success'))
    <x-toastify.success message="{{ session()->get('success') }}"/>
@endif
