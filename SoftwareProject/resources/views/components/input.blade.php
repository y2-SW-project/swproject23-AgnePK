@props(['disabled' => false, 'field' => ''])
<div>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'form-control mb-4',
    ]) !!}>
    @error($field)
        <div class="text-danger"> {{ $message }}</div>
    @enderror
</div>