<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form action="/register" method="POST">
        @csrf <!-- token untuk mencegah serangan CSRF, ini adalah fitur keamanan yang disediakan oleh Laravel untuk melindungi aplikasi dari serangan Cross-Site Request Forgery (CSRF) dengan memastikan bahwa setiap permintaan yang dikirim ke server berasal dari sumber yang sah -->

  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
      <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

      <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
        <x-form-label for="first_name">First Name</x-form-label>
        <div class="mt-2">
          <x-form-input name='first_name' id='first_name' value='{{ old("first_name") }}'></x-form-input>
          <x-form-error name='first_name'>
            
          </x-form-error>
        </div>
      </x-form-field>

        
         <x-form-field>
        <x-form-label for="last_name">Last Name</x-form-label>
        <div class="mt-2">
          <x-form-input name='last_name' id='last_name' value='{{ old("last_name") }}'></x-form-input>
          <x-form-error name='last_name'>
            
          </x-form-error>
        </div>
      </x-form-field>

       <x-form-field>
        <x-form-label for="email">Email</x-form-label>
        <div class="mt-2">
          <x-form-input name='email' id='email' type="email" value='{{ old("email") }}'></x-form-input>
          <x-form-error name='email'>
          </x-form-error>
        </div>
      </x-form-field>

       <x-form-field>
        <x-form-label for="password">Password</x-form-label>
        <div class="mt-2">
          <x-form-input name='password' id='password' type="password" value='{{ old("password") }}'></x-form-input>
          <x-form-error name='password'>
            
          </x-form-error>
        </div>
      </x-form-field>

         <x-form-field>
          <x-form-label for="password_confirmation">Confirm Password</x-form-label>
          <div class="mt-2">
             <x-form-input name='password_confirmation' id='password_confirmation' type="password"></x-form-input>
             <x-form-error name='password_confirmation'>
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
    <x-form-button>Register</x-form-button>
  </div>
</form>

</x-layout>