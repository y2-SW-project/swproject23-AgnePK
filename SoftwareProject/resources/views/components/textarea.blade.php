<div>
    @props(['disabled' => false, 'field' => '', 'value' => ''])

    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control mb-4']) !!}
    >{{ $value }}</textarea>
        @error($field)
            <div class="text-danger">{{ $message }}</div>
        @enderror
</div>


