<x-layout>
<x-slot:heading>
      log in
</x-slot:heading>

<form method="POST" action="/login">
@csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        

        <x-form-field class="sm:col-span-4">
            <X-form-lable for="email">Email</X-form-lable>
          <div class="mt-2">

            <x-form-input  name="email" id="email" placeholder="" type="email" require :value="old('email')"/>

            @error('email')
                  <p class="text-red-700 text-xm">{{$message}}</p>
            @enderror
          </div>
        </x-form-field>

        <x-form-field class="sm:col-span-4">
            <X-form-lable for="password">Password</X-form-lable>
          <div class="mt-2">

            <x-form-input  name="password" id="password" placeholder="" type="password" require/>

            <X-form-error name="password" />
          </div>
        </x-form-field>
      
      </div>

      <!-- <div class="mt-10">
      @if($errors->any()) 
         <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-600">{{$error}}</li>
            @endforeach
         </ul>
      @endif
      </div> -->

    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" class="text-sm pr-2 font-semibold leading-6 text-gray-900">Cancel</button>
    <x-form-button>Log in</x-form-button>
  </div>
</form>
</x-layout>