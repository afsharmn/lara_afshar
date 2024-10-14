{{--

$containerClass
$label
$removeAfterUpload
$multiple

$name ---> required
$processRoute ---> required

$maxFileSize

$acceptedFileTypes
$acceptedFileTypesTitle

$defaultFileAddress

--}}

<div @isset($containerClass) class="{{$containerClass}}" @endisset>

    @isset($label)
        <label for="{{$name}}" class="form-label fw-bold">{{ $label }}</label>
    @endisset

    <input
        type="file"
        @isset($class) class="{{$class}}" @endisset
        id="{{$name}}"
        name="{{$name}}"
        @if($attributes->has('multiple')) multiple @endif>

</div>


@isset($minHeight)

    @push('page_css')

        <style>
            .filepond--root .filepond--drop-label {
                min-height: {{ $minHeight }};
            }
        </style>

    @endpush

@endisset

@push('page_scripts')

    <!--suppress JSCheckFunctionSignatures -->
    <script type="module">


        // Create a FilePond instance
        const filePond = FilePond.create(document.getElementById('{{$name}}'), {

            server: {
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                process: '{{ $processRoute }}',
            },

            credits: false,

            @if($attributes->has('removeAfterUpload'))
            onprocessfile: (error, file) => {
                if (!error) {
                    setTimeout(function () {
                        Livewire.dispatch('refreshFiles');
                        filePond.removeFile(file.id);
                    }, 2000)
                }
            }
            @endisset

            //plugins--------------

            @isset($maxFileSize)
            allowFileSizeValidation: true,
            maxFileSize: '{{$maxFileSize}}',
            labelMaxFileSizeExceeded: 'فایل خیلی بزرگ است',
            labelMaxFileSize: 'حداکثر حجم فایل {filesize} است',
            @endisset

            @isset($acceptedFileTypes)
            allowFileTypeValidation: true,
            acceptedFileTypes: {!! json_encode($acceptedFileTypes , JSON_UNESCAPED_SLASHES) !!},
            labelFileTypeNotAllowed: 'فرمت فایل معتبر نیست',
            fileValidateTypeLabelExpectedTypes: ' فایل {{@$acceptedFileTypesTitle}} مجاز است',
            @endisset

            @if(!empty($address = old($name ,@$defaultFileAddress)))
            files: [
                {
                    source: '{{ $address }}',
                    options: {
                        type: 'local',
                        file: {
                            name: 'فایل بارگذاری شده',
                            size: '{{ @ \Illuminate\Support\Facades\File::size(storage_path($address)) }}',
                        },
                    },
                },
            ],
            @endif

        });

        $('#{{$name}}').closest('form').submit(function (e) {
            if (filePond.status === 3) {
                e.preventDefault();

                Toastify({
                    text: "{{ __('please wait until upload done') }}",
                    duration: 70000,
                    newWindow: true,
                    close: true,
                    className: "bg-warning",
                    gravity: "bottom", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: 'none',
                    },
                    onClick: function(){} // Callback after click
                }).showToast();

            } else {
                $(this).find(':submit').prop('disabled', true);
            }
        })
    </script>

@endpush
