<div @isset($containerClass) class="{{ $containerClass }} @endisset">

    <button
        class="btn  @isset($class) {{ $class }} @endisset"
        @if($attributes->has('submit')) type="submit" @endif

    >{{ $title }}</button>

</div>
