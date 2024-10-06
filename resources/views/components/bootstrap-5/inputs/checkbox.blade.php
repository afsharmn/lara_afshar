<div @isset($containerClass) class="{{ $containerClass }} @endisset">

    <div class="form-check  width-fit-content">

        <input
            type="checkbox"
            class="form-check-input @isset($class) {{ $class }} @endisset"
            id="{{$name}}"
            name="{{$name}}"
            value="{{$name}}"
            @if(old($name , request($name , $defaultValue ?? null)) == $name) checked @endif>

        @isset($label)
            <label for="{{$name}}" class="form-check-label">{{ $label }}</label>
        @endisset

    </div>

</div>
