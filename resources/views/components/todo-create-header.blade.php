<div class="py-4">

    <form x-data="{load:false}" action="{{route('create.todo')}}" method="post" class="relative">
        <div
            class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-gray-500 focus-within:ring-1 focus-within:ring-gray-500">

            <label for="title" class="sr-only">Title</label>
            <input type="text" name="title" id="title"
                   class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0"
                   placeholder="Write your title" value="{{old('title')}}">

            <label for="content" class="sr-only">Content</label>
            <x-textarea
                rows="2" name="content" id="content"
                placeholder="What are you thinking about?">{{old('content')}}</x-textarea>

            <!-- Spacer element to match the height of the toolbar -->
            <div aria-hidden="true">
                <div class="h-px"></div>
                <div class="py-2">
                    <div class="py-px">
                        <div class="h-9"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 inset-x-px">
            <div class="border-t border-gray-200 px-2 py-2 flex justify-between items-center space-x-3 sm:px-3">
                <div class="flex">
                    <span class="text-sm text-gray-500 group-hover:text-gray-600 italic">when you're ready..</span>
                </div>
                <div class="flex-shrink-0 flex items-center justify-center gap-2">
                    <time class="text-gray-400">{{now()->format('d/m/y H:i')}}</time>

                    <button :disabled="load" type="submit"
                            name="_token"
                            value="{{csrf_token()}}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <x-heroicon-o-check x-show="!load" class="-ml-1 h-5 w-5 mr-2 group-hover:text-gray-500"/>
                        <span x-show="load">•••</span>
                        <span x-show="!load">Save it!</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

</div>
