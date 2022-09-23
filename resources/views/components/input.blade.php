@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-green focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
