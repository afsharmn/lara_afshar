
@push('page_scripts')

    <script type="module">

        Toastify({
            text: "{{$message}}",
            duration: 7000,
            newWindow: true,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: 'black',
            },
            onClick: function(){} // Callback after click
        }).showToast();

    </script>

@endpush
