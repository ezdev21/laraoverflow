@section('title', 'ask new question')

<div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <h1 class="text-3xl py-2">Ask new question here</h1><hr>
            <form wire:submit.prevent="ask" class="my-2">
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

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Description
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea wire:model.lazy="question.description" id="description" required placeholder="description" rows="5"
                          class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                        </textarea>
                    </div>

                    @error('question.description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary focus:outline-none focus:border-primary focus:ring-primary active:bg-primary transition duration-150 ease-in-out">
                            Ask
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
