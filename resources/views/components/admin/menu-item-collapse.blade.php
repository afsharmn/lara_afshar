{{--

$title
$icon
$open

--}}

@php($name = Str::random(10))

<div class="d-flex flex-column">

    <a

        class="menu-item justify-content-between @if($attributes->has('open')) bg-dark bg-gradient @endif"
        data-bs-toggle="collapse"
        href="#{{$name}}"
        role="button"
        @if($attributes->has('open')) aria-expanded="true" @endif
        aria-controls="{{$name}}">

        <div>
            <i class="bi {{ $icon }}"></i>
            <span>{{ $title }}</span>
        </div>

        <bi class="bi bi-chevron-down"></bi>

    </a>

    <div class="collapse border-bottom @if($attributes->has('open')) show @endif" id="{{$name}}">

        {{ $slot }}

    </div>
</div>
