@props([
    'name' => 'required'
])
@error($name)
    <div class="text-danger mt-1 mb-1">
            {{ $message }}
    </div>
@enderror
