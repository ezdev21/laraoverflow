@section('title', $question->title)
@extends('layouts.app')
@section('content')

<div class="m-5">
    <div class="p-3 mb-5 shadow-xl rounded-xl bg-white w-full lg:w-5/12">
      <h1 class="font-medium text-xl">{{$question->title}}</h1>
      <p class="text-gray-800 my-1">{{$question->description}}</p>
      <p>{{$question->answers_count}}</p>
      <div class="inline mx-4">
        <button @click="console.log('like')" class="bg-white">
         <svg xmlns="http://www.w3.org/2000/svg" class=" h-10 w-10" :class="[liked? 'fill-current text-first' :'']" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
         </svg>
        </button>
        <span class="text-xl mr-2 my-auto">{{$question->totalLikes}}</span>
        <button @click="downVote" class="" >
         <svg xmlns="http://www.w3.org/2000/svg" class=" h-10 w-10" fill="none" :class="[disliked? 'fill-current text-first':'']" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
         </svg>
        </button>
        <span class="text-xl">{{$question->totalDislikes}}</span>
        <div x-if="liking" class="fixed z-20 bottom-1/3 left-1/3 bg-white p-10 flex flex-col justify-center items-center rounded-xl">
        <button @click="liking=false" class="absolute top-0 right-0 text-4xl px-3 text-gray:600 hover:text-primary">x</button>
        <p class="text-2xl">want to like this video ?</p>
        <p class="text-xl">sign in to like this video</p>
        <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
        </div>
        <div x-if="liking" @click="liking=false" class="absolute -inset-full opacity-50 bg-black z-10"></div>
        <div x-if="disliking" class="fixed z-20 bottom-1/3 left-1/3 inset-auto bg-white p-10 flex flex-col justify-center items-center rounded-xl"> --}}
        <button @click="disliking=false" class="absolute top-0 right-0 text-4xl px-3 text-gray:600 hover:text-primary">x</button>
        <p class="text-2xl">want to dislike this video ?</p>
        <p class="text-xl">sign in to dislike this video</p>
        <p class="m-auto"><a href="/login" class="text-2xl text-primary">sign in</a></p>
        </div>
        <div x-if="disliking" @click="disliking=false" class="absolute -inset-full opacity-50 bg-black z-10"></div>
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
      <p><a href="/login" class="text-primary">login</a> to answer  this question</p>
      @endauth
    </div>
</div>
@endsection
