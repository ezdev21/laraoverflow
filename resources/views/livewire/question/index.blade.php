@section('title', 'questions')

<div class="w-full mx-auto">
  <div class="flex flex-wrap p-2">
    @forelse ($questions as $question)
    <div class="p-3 m-3 shadow-xl rounded-xl bg-white w-full lg:w-5/12">
      <h1 class="font-medium text-xl">{{$question->title}}</h1>
      <p class="text-gray-800 my-1">{{$question->description}}</p>
      <p>{{$question->answers_count}}</p>
      <p class="text-gray-600 text-sm">{{$question->created_at->diffForHumans()}}</p>
    </div>
    @empty
      <p class="text-2xl text-center">No asked questions yet!</p>
    @endforelse
  </div>
</div>
