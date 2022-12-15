@section('title', 'about')
@extends('layouts.app')
@section('content')
  <div>
    <p>although inspired by stackoverflow this project is not intended to replace/clone stackoverflow</p>
    <h1>Technologies used</h1>
    <ul>
      <li>-Laravel</li>
      <li>-Tailwindcss</li>
      <li>-Livewire</li>
      <li>-Alpinejs</li>
      <li>-Filament admin panel</li>
    </ul>
    <p class="flex space-x-3">
      <a class="underline text-blue-600" href="https://github.com/ezra02/laraoverflow">star the repo</a>
    </p>
    <div x-data="{}">
      Alpine.store('notifications', {
        items: [],

        notify(message) {
          this.items.push(message)
        }
      })
      <button  @click="toggle">toggle</button>
      <h1 x-show="open">heading</h1>
    </div>
  </div>
@endsection
