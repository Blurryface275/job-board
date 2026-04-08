<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
      @if (session('error'))
    <x-form-error name="error" class="mb-8">
        {{ session('error') }}
    </x-form-error>
@endif
    <form action="/login" method="POST">
        @csrf <!-- token untuk mencegah serangan CSRF, ini adalah fitur keamanan yang disediakan oleh Laravel untuk melindungi aplikasi dari serangan Cross-Site Request Forgery (CSRF) dengan memastikan bahwa setiap permintaan yang dikirim ke server berasal dari sumber yang sah -->

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
      <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

       <x-form-field>
        <x-form-label for="email">Email</x-form-label>
        <div class="mt-2">
          <x-form-input name='email' id='email' type="email"></x-form-input>
          <x-form-error name='email'>
          </x-form-error>
        </div>
      </x-form-field>

       <x-form-field>
        <x-form-label for="password">Password</x-form-label>
        <div class="mt-2">
          <x-form-input name='password' id='password' type="password"></x-form-input>
          <x-form-error name='password'>
            
          </x-form-error>
        </div>
      </x-form-field>

        
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

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/jobs" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
    <x-form-button>Login</x-form-button>
  </div>
</form>

</x-layout>