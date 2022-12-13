@section('title', 'questions')

@extends('layouts.app')
@section('content')

<div class="flex">
  <h1>hello</h1>
  <div class="w-5/6 flex flex-wrap py-2">
    @forelse ($questions as $question)
    <div class="p-3 m-3 shadow-xl rounded-md bg-white w-full lg:w-5/12 @if($question->answers->count()==0) border-2 border-primary @endif">
      <a href="/questions/{{$question->id}}">
        <h1 class="font-medium text-xl">{{$question->title}}</h1>
        <p class="text-gray-800 my-1">{{$question->description}}</p>
        <p>
            <span>{{$question->answers_count}} answers</span>
        </p>
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
  <div class="w-1/6 pt-3 mt-3">
    <a href="{{ route('questions.create') }}" class="font-semibold text-white bg-primary py-2.5 px-10 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150">ask</a>
  </div>
</div>
@endsection
