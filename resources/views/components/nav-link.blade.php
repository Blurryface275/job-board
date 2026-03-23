{{-- resources/views/components/nav-link.blade.php --}}
@props(['active' => false, 'type' => 'a'])

{{-- kalau type adalah 'a' maka gunakan tag <a> --}}
@if($type === 'a')
<a class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
   aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    {{ $slot }}
</a>
{{-- kalau bukan 'a' maka gunakan tag <button>--}}
@else

<button class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
        aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</button>
@endif


