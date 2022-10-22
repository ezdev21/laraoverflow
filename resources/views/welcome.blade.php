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
                        <a href="{{ route('login') }}" class="font-medium text-primary py-2 px-4 rounded-md border border-primary focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-white bg-primary py-2 px-4 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150" style="background-color: darkorange">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center">
            <div class="flex flex-col justify-around">
                <div class="space-y-6">

                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                        welcome to <span class="text-primary">LaraOverflow</span>
                    </h1>

                    <ul class="list-reset flex space-x-5">
                        <li>
                            <a href="{{route('questions.index')}}" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">Questions</a>
                        </li>
                        <li>
                            <a href="{{route('questions.create')}}" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">Ask</a>
                        </li>
                        <li>
                            <a href="" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">About</a>
                        </li>
                        <li>
                            <a href="https://github.com/ezra02/laraoverflow" class="font-medium text-primary focus:outline-none focus:underline transition ease-in-out duration-150">Star</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex wrap justify-between space-x-5 m-14 text-2xl text-gray-700">
            <div class="bg-white py-10 px-5 flex flex-col space-y-2 items-center rounded-xl border border-primary shadow-2xl">
                <h1 class="text-4xl font-bold my-2 text-primary">1000|500</h1>
                <p>Tailwindcss Questions and Answers</p>
            </div>
            <div class="bg-white py-10 px-5 flex flex-col space-y-2 items-center rounded-xl border border-primary shadow-2xl">
                <h1 class="text-4xl font-bold my-2 text-primary">1000|500</h1>
                <p>AlpineJs Questions and Answers</p>
            </div>
            <div class="bg-white py-10 px-5 flex flex-col space-y-2 items-center rounded-xl border border-primary shadow-2xl">
                <h1 class="text-4xl font-bold my-2 text-primary">1000|500</h1>
                <p>Laravel Questions and Answers</p>
            </div>
            <div class="bg-white py-10 px-5 flex flex-col space-y-2 items-center rounded-xl border border-primary shadow-2xl" style="border-color: #fd6fab">
                <h1 class="text-4xl font-bold my-2 text-primary">1000|500</h1>
                <p>Livewire Questions and Answers</p>
            </div>
        </div>
    </div>
@endsection
