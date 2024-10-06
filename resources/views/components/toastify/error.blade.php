
@push('page_scripts')

    <script type="module">

        Toastify({
            text: "{{$message}}",
            duration: 70000,
            newWindow: true,
            close: true,
            className: "bg-danger",
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: 'none',
            },
            onClick: function(){} // Callback after click
        }).showToast();

    </script>

@endpush
