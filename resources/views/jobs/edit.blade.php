<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job['title'] }}
    </x-slot:heading>
    <form action="/jobs/{{ $job->id }}" method="POST">
        @csrf <!-- token untuk mencegah serangan CSRF, ini adalah fitur keamanan yang disediakan oleh Laravel untuk melindungi aplikasi dari serangan Cross-Site Request Forgery (CSRF) dengan memastikan bahwa setiap permintaan yang dikirim ke server berasal dari sumber yang sah -->
        @method('PATCH')

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
      <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input 
              id="title"
              type="text" 
              name="title" 
              placeholder="Shift Leader" 
              value="{{ $job['title'] }}"
              class="block min-w-0 grow bg-white py-1.5 pr-3 px-3 pl-1 not-[:text-base]:text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"/>
            </div>
            @error('title')
            <p class='text-xs text-red-500 font-semibold mt-1'>{{$message}}</p>
            @enderror
          </div>
        </div>

        
        <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input 
              id="salary" 
              type="text" 
              name="salary" 
              value="{{ $job['salary'] }}"
              class="block min-w-0 grow bg-white py-1.5 pr-3 px-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
            </div>
            @error('salary')
            <p class='text-xs text-red-500 font-semibold mt-1'>{{$message}}</p>
            @enderror
          </div>
        </div>

        <div class="col-span-full">
          <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
          <div class="mt-2">
            <textarea 
            id="description" 
            type="text" 
            name="description" 
            value="{{ $job->description }}"
            rows="3" 
            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the job.</p>
          @error('description')
            <p class='text-xs text-red-500 font-semibold mt-1'>{{$message}}</p>
            @enderror
        </div>

        
      </div>
      {{-- @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error )
        <li class="text-red-600 italic">{{$error}}</li>
            
        @endforeach
      </ul>
          
      @endif --}}
    </div>

    

  </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div>
        <button form ="delete-form" class="text-red-600 hover:text-red-800 text-sm font-semibold">Delete</button>
    </div>
    <div class="flex items-center gap-x-6">
      <a class="text-sm/6 font-semibold text-gray-900 hover:text-gray-400" href="/jobs/{{$job['id']}}">Cancel</a>
        <div>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Job</button>
      </div>
    </div>
  </div>
</form>
{{-- Delete Form --}}
<form action="/jobs/{{$job->id}}" method="POST" id='delete-form' class='hidden'>
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">Delete</button>
</form>
</x-layout>