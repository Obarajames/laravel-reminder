<x-layout>
<x-slot:heading>
      create heading
</x-slot:heading>

<form method="POST" action="/jobs">
@csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new job</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">share job .</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field class="sm:col-span-4">
            <X-form-lable for="title">Title</X-form-lable>
          <div class="mt-2">

            <x-form-input  name="title" id="title" placeholder="CEO" require/>

            <X-form-error name='title'/>
          </div>
        </x-form-field>

        <x-form-field class="sm:col-span-4">
            <X-form-lable for="salary">salary</X-form-lable>
          <div class="mt-2">

            <x-form-input  name="salary" id="salary" placeholder="$1000 USD" require/>

            <X-form-error name="salary" />
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
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <x-form-button>Save</x-form-button>
  </div>
</form>
</x-layout>