@extends('layouts.base')

@section('body')
    <div class="bg-gray-200 sm:px-6 lg:px-8">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
