<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
        <div class="space-y-4">
        @foreach ($jobs as $job)
        
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg"> 
            <div class="text-blue-600 font-semibold">{{$job->employer->name}}</div>
            <div>
                <strong>{{ $job['title'] }} pays :${{ number_format($job['salary']) }} per year</strong>
            </div>
        </a>
        @endforeach
        </div>
  
</x-layout>