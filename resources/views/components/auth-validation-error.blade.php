@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __("Ups! Sepertinya ada yang salah 🤔") }}
        </div>
    </div>

@endif