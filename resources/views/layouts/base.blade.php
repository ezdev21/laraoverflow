<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')
            <title>@yield('title') - Lara Overflow</title>
        @else
            <title>Lara Overflow</title>
        @endif
        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.png')) }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        {{-- <livewire:styles />
        <livewire:scripts /> --}}
        <!-- CSRF Token -->
    </head>
    <body class="bg-gray-200">
        <div x-data="{user:{{auth()->user()}},userDropdownMenu:false}" class="block right-0 lg:hidden bg-gradient-to-r from-[#004e85] to-[#4fffd6] via-[#fcfe5c]">
            <button x-on:click="userDropdownMenu=true">
              <svg xmlns="http://www.w3.org/2000/svg" class="text-primary h-12 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
            <div x-show="userDropdownMenu" x-on:click.outside="userDropdownMenu=false" class="bg-gray-200 absolute top-2 left-2">
                <ul class="z-20">
                    <li class="hover:bg-blue-200 px-5 py-1"><a href="/">Home</a></li>
                    <li class="hover:bg-blue-200 px-5 py-1"><a href="{{route('questions.create')}}}">Ask</a></li>
                    <div x-if="!user" class="text-center">
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </div>
                    <div x-show="user">
                        <li class="text-center">
                            <a
                              href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              class="font-medium primary focus:outline-none focus:underline transition ease-in-out duration-150">Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-around bg-gradient-to-r from-[#004e85] to-[#4fffd6] via-[#fcfe5c] w-full top-0 overflow-hidden">
            <div>
                <a href="/" class="flex items-center">
                    <img src="/favicon.png" alt="app logo" class="w-20">
                    <span class="text-3xl font-bold text-gray-600 font-logo typing-text">Lara<span class="text-primary">Overflow</span></span>
                </a>
            </div>
            <div class="rounded-xl my-auto py-auto mx-3 hidden lg:inline">
              <form @submit.prevent="search" class="flex rounded-md">
                 <input type="search" v-model="searchQuery" required class="w-96 py-1.5 px-2 text-lg outline-none rounded-l-md focus:outline-none focus:ring-primary border-gray-300 focus:border-primary" placeholder="search LaraOverflow">
                 <button type="submit" class="bg-primary text-xl py-1.5 px-5 my-auto rounded-r-md" >
                   <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-8 w-8 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                 </button>
              </form>
            </div>
            <div class="flex space-x-5 items-center text-primary">
                <div class="flex space-x-3 text-primary">
                    <a href="{{ route('questions.create') }}" class="text-xl border-primary boder-2 py-2.5 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150">Ask</a>
                    <a href="/about" class="text-xl boder-2 py-2.5 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150">About</a>
                </div>
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <div x-data="{user:{{auth()->user()}},userDropdownMenu:false}" class="my-auto hidden lg:inline xl:inline 2xl:inline">
                                <button x-on:click="userDropdownMenu=true" class="my-auto flex">
                                  <span class="text-xl capitalize" x-text="user.name"></span>
                                  <svg xmlns="http://www.w3.org/2000/svg" class="font-medium my-auto h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                                </button>
                                <div x-show="userDropdownMenu" x-on:click.outside="userDropdownMenu=false" class="bg-gray-200 absolute top-2 right-2">
                                    <ul class="z-20">
                                        <li class="hover:bg-blue-200 px-5 py-1"><a href="/">Home</a></li>
                                        <li class="hover:bg-blue-200 px-5 py-1"><a href="{{route('questions.create')}}}">Ask</a></li>
                                        <a
                                          href="{{ route('logout') }}"
                                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                          class="font-medium primary focus:outline-none focus:underline transition ease-in-out duration-150">Log out</a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                       </form>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-primary py-2.5 px-5 rounded-md border-2 border-primary focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-semibold text-white bg-primary py-2.5 px-5 rounded-md focus:outline-none focus:underline transition ease-in-out duration-150">Sign up</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
        <div class="px-10 mt-5">
            @yield('body')
        </div>
    </body>
</html>
