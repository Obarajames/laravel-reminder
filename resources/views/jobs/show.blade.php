<x-layout>
<x-slot:heading>
      Job heading
</x-slot:heading>
<h1>hello Job</h1>

<h2>{{$job->title}}</h2>

<p>
      this is the job salery {{$job->salary}}
</p>

<br>

@can('edit_job', $job)
<a href="/jobs/{{$job->id}}/edit" class="p-3 mt-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white">Edit Job</a>
@endcan
</x-layout>