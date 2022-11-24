{{-- @section('title', $question->title)
@extends('layouts.app')
@section('content') --}}
<div class="m-5">
    <div class="p-3 mb-5 shadow-xl rounded-xl bg-white w-full lg:w-5/12">
      <h1 class="font-medium text-xl">{{$question->title}}</h1>
      <p class="text-gray-800 my-1">{{$question->description}}</p>
      <p>{{$question->answers_count}}</p>
      <div class="inline mx-4">
        <button wire:click.prevent="upVote()">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 @if($question->liked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
          </svg>
        </button>
        <span class="text-xl mr-2 my-auto">{{$question->totalUpVote}}</span>
        <button wire:click.prevent="downVote">
          <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="h-10 w-10 @if($question->disliked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
          </svg>
        </button>
        <span class="text-xl">{{$question->totalDownVote}}</span>
    {{-- <div x-if="" class="fixed z-20 bottom-1/3 left-1/3 bg-white p-10 flex flex-col justify-center items-center rounded-xl">
            <button x-click="" class="absolute -top-1 -right-1 text-4xl bg-white text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>
            </button>
            <p class="text-2xl">want to upvote this question ?</p>
            <p class="text-xl">sign in to upvote this question</p>
            <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
          </div>
            <div x-if="" @click="liking=false" class="absolute -inset-full opacity-50 bg-black z-10"></div>
            <div x-if="" class="fixed z-20 bottom-1/3 left-1/3 inset-auto bg-white p-10 flex flex-col justify-center items-center rounded-xl">
            <button x-click="" class="absolute -top-2 -right-2 text-4xl text-gray:600 text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
            </button>
            <p class="text-2xl">want to downvote this question ?</p>
            <p class="text-xl">sign in to downvote this question</p>
            <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
            </div>
            <div x-if="" @click="disliking=false" class="absolute -inset-full opacity-50 bg-black z-10"></div>--}}
        </div>
      <p class="text-gray-600 text-sm">{{$question->created_at->diffForHumans()}}</p>
    </div>
    <div>
      @auth
        <h1 class="text-2xl">submit your answer here</h1>
        <form @submt.prevent="answer" method="post">
          <textarea :model="answer" class="p-2 w-96 h-32 rounded-xl border border-gray-300">
          </textarea>
        </form>
      @else
      <p><a href="/login" class="text-primary text-xl">login</a> to answer  this question</p>
      @endauth
    </div>
    <div>
      @forelse ($question->answers as $answer)
      <div class="flex flex-col items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 @if($answer->liked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
        </svg>
        @isset($record)
            <img src="" alt="" class="h-12 w-12 rounded-full m-2">
        @else
            <div class="h-12 w-12 rounded-full m-2 text-white bg-purple-500 flex justify-center items-center">A</div>
        @endisset
        <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="h-10 w-10 @if($answer->disliked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
        </svg>
        </div>
        <div>
        <p>{{$answer->body}}</p>
        <p class="text-gray-500">{{$answer->updated_at}}</p>
      </div>
      @empty
        <p>No answers found</p>
      @endforelse
    </div>
</div>
{{-- @endsection --}}
