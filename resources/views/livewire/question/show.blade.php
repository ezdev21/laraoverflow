{{-- @section('title', $question->title)
@extends('layouts.app')
@section('content') --}}
<div class="flex space-x-3">
  <div class="w-3/4">
    <div class="p-3 mb-5 shadow-xl rounded-xl bg-white">
      <h1 class="font-medium text-xl">{{$question->title}}</h1>
      <p class="text-gray-800 my-1">{{$question->description}}</p>
      <p>{{$question->answers_count}}</p>
      <div class="inline mx-4">
        <button wire:click.prevent="upVote()"">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 @if($question->liked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
          </svg>
        </button>
        <span class="text-xl mr-2 my-auto">{{$question->totalUpVote}}</span>
        <button wire:click.prevent="downVote()">
          <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="h-10 w-10 @if($question->disliked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
          </svg>
        </button>
          <span class="text-xl">{{$question->totalDownVote}}</span>
          <p class="text-sm">
          <span class="text-gray-600">viewed </span><span>{{$question->views}} times</span>
          <span class="text-gray-600">asked </span><span>{{$question->created_at->diffForHumans()}}</span>
          @if($question->created_at!=$question->updated_at)
          <span class="text-gray-600">modified </span><span>{{$question->updated_at->diffForHumans()}}</span>
          @endif
       </p>
      </div>
    </div>
    @if($question->voting)
        <div class="fixed z-20 top-1/4 left-1/4 bg-white p-10 flex flex-col justify-center items-center rounded-xl">
        <button wire:click="closeModal()" class="absolute -top-1 -right-1 text-4xl text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
        </button>
        <p class="text-2xl">want to upvote/downvote this question ?</p>
        <p class="text-xl text-gray-600">sign in to upvote/downvote this question</p>
        <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
        </div>
        <div wire:click="closeModal()" class="absolute -inset-full opacity-50 bg-black z-10"></div>
    @endif
    @auth
    <div>
      <h1 class="text-2xl">submit your answer here</h1>
      <form wire:submit="answer()" class="">
      <textarea wire:model="answer" class="w-5/12 h-32 rounded-xl border border-gray-300 focus:border-primary focus:ring-primary">
      </textarea>
      <input type="submit" value="submit" class="block cursor-pointer font-semibold text-white bg-primary py-2.5 px-10 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150">
      </form>
      @else
      <p><a href="/login" class="text-primary text-xl">login</a> to answer  this question</p>
    </div>
    @endauth
      <p class="my-1 text-xl">{{$question->answers->count()}} answers found</p>
      @forelse ($question->answers as $answer)
      <div class="flex mt-3">
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 @if($answer->liked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>
            @isset($record)
                <img src="/storage/profile/useravatar.jpeg" alt="" class="h-12 w-12 rounded-full my-1">
            @else
                <div class="h-12 w-12 rounded-full my-1 text-white bg-primary flex justify-center items-center text-2xl">{{$this->getFirstChar()}}</div>
            @endisset
            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="h-10 w-10 @if($answer->disliked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </div>
        <div class="p-2">
            <p>{{$answer->body}}</p>
            <p class="text-gray-500">{{$answer->updated_at->diffForHumans()}}</p>
        </div>
      </div>
      @empty
        <p>No answers found</p>
      @endforelse
    </div>
  </div>
  <div class="w-1/4">
     <h1 class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi animi eius aliquam, aperiam fugiat, odio esse mollitia magnam cumque eos neque tempora deleniti. Dolore, doloremque quidem sapiente ab expedita incidunt.</h1>
  </div>
</div>
{{-- @endsection --}}
