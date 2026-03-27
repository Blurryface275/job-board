<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    
    <h2 class="text-xl font-bold mb-4">
        {{ $job['title']}}
    </h2>
    <p>
        This job pays ${{ number_format($job['salary']) }} per year.
    </p>

    <p class="mt-6">
        <x-button href="/jobs/{{ $job['id'] }}/edit">Edit Job</x-button>
    </p>
</x-layout>