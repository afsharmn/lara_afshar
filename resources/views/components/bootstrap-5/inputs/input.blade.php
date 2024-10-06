<div @isset($containerClass) class="{{ $containerClass }} @endisset">

    @isset($label)
        <label for="{{$name}}" class="form-label">{{ $label }}</label>
    @endisset

    <input
        type="{{$type}}"
        class="form-control  @isset($class) {{ $class }} @endisset"
        id="{{$name}}"
        name="{{$name}}"
        value="{{ old($name , request($name , $defaultValue ?? null)) }}"
        @isset($minlength) minlength="{{ $minlength }}" @endisset
        @isset($maxlength) maxlength="{{ $maxlength }}" @endisset
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        @if($attributes->has('disabled')) disabled @endif
        @if($attributes->has('required')) required @endif>

</div>
