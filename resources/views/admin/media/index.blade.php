@extends('admin::layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-12 col-lg-3">

                <x-admin.filepond
                    name="uploadFilePond"
                    class="shadow"
                    :processRoute="route('admin.upload.public')"
                    multiple
                    removeAfterUpload
                    minHeight="200px"/>

            </div>

            <div class="col-12 col-lg-9">

                <div class="card">
                    <div class="card-body">
                        <livewire:media-list />
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

