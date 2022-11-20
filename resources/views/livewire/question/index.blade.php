@section('title', 'questions')

@extends('layouts.app')
@section('content')

<div class="flex">
  <div class="w-5/6 flex flex-wrap py-2">
    @forelse ($questions as $question)
    <div class="p-3 m-3 shadow-xl rounded-xl bg-white w-full lg:w-5/12">
      <a href="/questions/{{$question->id}}">
        <h1 class="font-medium text-xl">{{$question->title}}</h1>
        <p class="text-gray-800 my-1">{{$question->description}}</p>
        <p>{{$question->answers_count}}</p>
        <p class="text-gray-600 text-sm">{{$question->created_at->diffForHumans()}}</p>
      </a>
    </div>
    @empty
      <p class="text-2xl text-center">No asked questions found yet!</p>
    @endforelse
    <div>
        {{$questions->links()}}
    </div>
  </div>
  <div class="w-1/6">

  </div>
</div>
@endsection
