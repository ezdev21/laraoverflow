@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium primary focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-white bg-primary py-2 px-4 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">

                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                        welcome to <span class="text-primary">Lara</span><span class="text-secondary">Overflow</span>
                    </h1>

                    <ul class="list-reset">
                        <li class="inline px-4">
                            <a href="{{route('questions.index')}}" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">Questions</a>
                        </li>
                        <li class="inline px-4">
                            <a href="{{route('questions.create')}}" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">Ask</a>
                        </li>
                        <li class="inline px-4">
                            <a href="" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150"></a>
                        </li>
                        <li class="inline px-4">
                            <a href="" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
