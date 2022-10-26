@section('title', 'edit question')
@extends('layouts.app')
@section('content')

<div>
    <div class="p-3 m-3 shadow-xl rounded-xl bg-white w-full lg:w-5/12">
      <h1 class="font-medium text-xl">{{$question->title}}</h1>
      <p class="text-gray-800 my-1">{{$question->description}}</p>
      <p>{{$question->answers_count}}</p>
      <p class="text-gray-600 text-sm">{{$question->created_at->diffForHumans()}}</p>
    </div>
</div>
@endsection
