<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
        <div class="space-y-4">

        <form action="/jobs" method="GET" class="mb-6 flex gap-2">
        <input
            type="text"
            name="search"
            placeholder="Search jobs ..."
            class="border rounded px-4 py-2 w-full"
            />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Search
            </button>
    </form>
    @foreach ($jobs as $job)
    {{-- Showing jobs count. such as : "Showing 3 jobs contain 'manager' in title"
    --}}
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg">
            <div class="text-blue-600 font-semibold">{{$job->employer->name}}</div>
            <div>
                <strong>{{ $job['title'] }} pays :${{ $job['salary'] }} per year</strong>
            </div>
        </a>
        @endforeach


        <div>
            {{$jobs->links()}}
        </div>
        </div>

</x-layout>
