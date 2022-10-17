@section('title', 'questions')

<div>
  <div class="flex p-2">
    @forelse ($questions as $question)
      <div class="p-3 m-3 shadow-xl rounded-xl bg-white w-1/4">
         <h1>{{$question->title}}</h1>
         <p>{{$question->description}}</p>
         <p>{{$answers_count}}</p>
      </div>
    @empty
      <p class="text-2xl text-center">No asked questions yet!</p>
    @endforelse
  </div>
</div>
