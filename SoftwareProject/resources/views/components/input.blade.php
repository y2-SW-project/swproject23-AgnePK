@props(['disabled' => false, 'field' => ''])
<div>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'form-control mb-4 focus-ring-none',
    ]) !!}>
    @error($field)
        <div class="text-danger"> {{ $message }}</div>
    @enderror
</div>
