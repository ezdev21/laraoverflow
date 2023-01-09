@section('title', "search $this->query")
<div>
    @forelse ($this->questions as $question)
    <div class="p-3 m-3 shadow-xl rounded-md bg-white w-full lg:w-5/12 @if($question->answers->count()==0) border-2 border-red-500 @endif">
      <a href="/questions/{{$question->id}}">
        <h1 class="font-medium text-xl">{{$question->title}}</h1>
        @if(strlen($question->description)<200)
          <p class="text-md text-gray-800 my-1">{{$question->description}}</p>
        @else
        <p class="text-gray-800 text-md my-1">{{substr($question->description,0,200)}}...</p>
        @endif
        <p>
            <span>{{$question->answers_count}} answers</span>
        </p>
        <p class="text-gray-600 text-sm">{{$question->created_at->diffForHumans()}}</p>
      </a>
    </div>
    @empty
      <p class="text-2xl text-center">No questions found like {{$this->query}}</p>
    @endforelse
</div>
