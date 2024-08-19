<x-layout>
<x-slot:heading>
      Jobs heading
</x-slot:heading>
<h1>hello Jobs</h1>
<div>
@foreach($jobs as $job)
<li class="space-y-4">
      <a href="/jobs/{{ $job['id']}}" class=" block px-4 border border-gray-200">

            <strong>{{$job['title']}}:</strong>
            <br>
            <strong> {{$job['salary']}}</strong>

            <br><br>
      </a>
</li>

@endforeach 
</div>
<br>
<div>
      {{$jobs->links()}}
      </div>
</x-layout>