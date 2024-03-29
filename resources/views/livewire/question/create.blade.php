@section('title', 'ask question')
<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md m-5 p-2">
        <div class="px-4 bg-white shadow sm:rounded-lg sm:px-10 p-2">
            <h1 class="text-3xl py-2">Ask new question</h1><hr>
            <form wire:submit.prevent="ask" class="my-2 flex flex-col space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Title
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="question.title" id="title" name="title" type="text" required autofocus placeholder="title" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    @error('question.title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 leading-5">
                        Description
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea wire:model.lazy="question.description" id="description" required placeholder="description" rows="5"
                          class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none border-2 focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                        </textarea>
                    </div>
                    @error('question.description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Topics(maximum 5 tags)
                    </label>
                    <div class="flex space-x-2">
                      @foreach($this->tags as $tag)
                        <div class="bg-gray-500 text-white text-md rounded-sm flex items-center space-x-1 px-1">
                            <span>{{$tag}}</span>
                            <button wire:click.prevent="removeTag({{$tag}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 bg-red-500 rounded-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                      @endforeach
                    </div>
                    @if ($this->maxTagError)
                        <p class="text-red-500">maximun tag reached</p>
                    @endif
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="tag" wire:keydown.enter="addTag" type="text" placeholder="tag" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>
                    @error('question.tag')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" wire:loading.attr="disabled" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary focus:outline-none focus:border-primary focus:ring-primary active:bg-primary transition duration-150 ease-in-out">
                            <span wire:loading.remove>Ask</span>
                            <span wire:loading>Please Wait</span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
