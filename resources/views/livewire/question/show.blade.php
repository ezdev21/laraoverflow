@section('title', $question->title)
@extends('layouts.app')
@section('content')

<div class="m-5">
    <div class="p-3 mb-5 shadow-xl rounded-xl bg-white w-full lg:w-5/12">
      <h1 class="font-medium text-xl">{{$question->title}}</h1>
      <p class="text-gray-800 my-1">{{$question->description}}</p>
      <p>{{$question->answers_count}}</p>
      <div class="inline mx-4">
        <button @click="upVote" class="bg-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 @if($question->liked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
            <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
          </svg>
        </button>
        <span class="text-xl mr-2 my-auto">{{$question->totalLikes}}</span>
        <button @click="downVote" class="" >
         <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="h-10 w-10 @if($question->disliked) text-primary @else text-gray-400 @endif" viewBox="0 0 16 16">
           <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
         </svg>
        </button>
        <span class="text-xl">{{$question->totalDislikes}}</span>
        {{-- <div x-if="liking" class="fixed z-20 bottom-1/3 left-1/3 bg-white p-10 flex flex-col justify-center items-center rounded-xl">
        <button @click="liking=false" class="absolute top-0 right-0 text-4xl px-3 text-gray:600 hover:text-primary">x</button>
        <p class="text-2xl">want to like this video ?</p>
        <p class="text-xl">sign in to like this video</p>
        <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
        </div>
        <div x-if="liking" @click="liking=false" class="absolute -inset-full opacity-50 bg-black z-10"></div>
        <div x-if="disliking" class="fixed z-20 bottom-1/3 left-1/3 inset-auto bg-white p-10 flex flex-col justify-center items-center rounded-xl"> --}}
        {{-- <button @click="disliking=false" class="absolute top-0 right-0 text-4xl px-3 text-gray:600 hover:text-primary">x</button>
        <p class="text-2xl">want to dislike this video ?</p>
        <p class="text-xl">sign in to dislike this video</p>
        <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
        </div>
        <div x-if="disliking" @click="disliking=false" class="absolute -inset-full opacity-50 bg-black z-10"></div> --}}
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
    <div x-data="{answers:{{$question->answers}}}">
      <div x-for="answer in answers" class="flex">
         <div class="flex flex-col">
           <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10" :class="[answer.liked? 'text-primary' : 'text-gray-400']" viewBox="0 0 16 16">
             <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
           </svg>
           <img src="" alt="" class="h-5 w-5 rounded-full m-2">
           <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="h-10 w-10" :class="[answer.disliked? 'text-primary' : 'text-gray-400']" viewBox="0 0 16 16">
             <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
           </svg>
         </div>
         <div>
            <p :x-text="answer.body"></p>
            <p :x-text="answer.updated_at" class="text-gray-500"></p>
         </div>
      </div>
    </div>
</div>
@endsection
