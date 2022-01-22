<div class="relative">
    @foreach($todos as $todo)

        <form x-data="{load:false,del:false}" action="{{route('update.todo',$todo->id)}}" method="post"
              class="relative my-2">

            <img alt="image complete" width="200" src="/res/completo-png-Transparent-Images.png"
                 class="z-20 absolute pointer-events-none top-0 right-16 {{$todo->complete?'':'sr-only'}}">

            <div
                class="border border-gray-300 rounded-lg shadow-sm overflow-hidden focus-within:border-gray-500 focus-within:ring-1 focus-within:ring-gray-500">

                <label for="title" class="sr-only">Title</label>
                <input type="text" name="title" id="title"
                       class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0"
                       placeholder="Title" value="{{$todo->title}}">

                <label for="description" class="sr-only">Description</label>
                <x-textarea
                    rows="2" name="content" id="content"
                    placeholder="What are you thinking about?">{{$todo->content}}</x-textarea>

                <!-- Spacer element to match the height of the toolbar -->
                <div aria-hidden="true">
                    <div class="py-2">
                        <div class="h-9"></div>
                    </div>
                    <div class="h-px"></div>
                    <div class="py-2">
                        <div class="py-px">
                            <div class="h-9"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute z-10 bottom-0 inset-x-px">

                <!-- Actions: These are just examples to demonstrate the concept, replace/wire these up however makes sense for your project. -->
                <div class="flex flex-nowrap justify-end items-center py-2 px-2 space-x-2 sm:px-3">

                    <div class="flex-shrink-0">
                        <div class="relative">

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <!-- Enabled: "bg-gray-600", Not Enabled: "bg-gray-200" -->
                            <button x-data="{toggle:'{{$todo->complete?1:null}}'}" type="button"
                                    x-on:click="toggle = !toggle;"
                                    :class="toggle?'bg-gray-600':'bg-gray-200'"
                                    class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                    role="switch" aria-checked="false">
                                <span class="sr-only">Toggle todo</span>

                                <input type="hidden" name="complete" :value="toggle?1:0"/>

                                <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                <span
                                    :class="toggle?'translate-x-5':'translate-x-0'"
                                    class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">

                                    <!-- Enabled: "opacity-0 ease-out duration-100", Not Enabled: "opacity-100 ease-in duration-200" -->
                                    <span
                                        :class="toggle?'opacity-0 ease-out duration-100':'opacity-100 ease-in duration-200'"
                                        class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                                        aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor"
                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </span>

                                    <!-- Enabled: "opacity-100 ease-in duration-200", Not Enabled: "opacity-0 ease-out duration-100" -->
                                    <span
                                        :class="toggle?'opacity-100 ease-in duration-200':'opacity-0 ease-out duration-100'"
                                        class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                                        aria-hidden="true">
                                      <svg class="h-3 w-3 text-gray-600" fill="currentColor" viewBox="0 0 12 12">
                                        <path
                                            d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"/>
                                      </svg>
                                    </span>
                                  </span>
                            </button>

                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-2 py-2 flex justify-between items-center space-x-3 sm:px-3">
                    <div class="flex">
                        <a href="{{route('delete.todo',$todo->id)}}"
                           class="-ml-2 -my-2 rounded-full px-3 py-2 inline-flex items-center text-left text-gray-400 group">
                            <!-- Heroicon name: solid/paper-clip -->
                            <x-heroicon-o-trash x-show="!del" class="-ml-1 h-5 w-5 mr-2 group-hover:text-gray-500"/>

                            <span class="text-sm text-gray-500 group-hover:text-gray-600 italic">
                                <span x-show="del">•••</span>
                                <span x-show="!del">Delete todo</span>
                            </span>
                        </a>
                    </div>
                    <div class="flex-shrink-0 flex items-center justify-center gap-2">
                        <time class="text-gray-400">{{$todo->created_at->format('d/m/y H:i')}}</time>

                        <button :disabled="load" type="submit"
                                name="_token"
                                value="{{csrf_token()}}"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <x-heroicon-o-refresh x-show="!load" class="-ml-1 h-5 w-5 mr-2 group-hover:text-gray-500"/>
                            <span x-show="load">•••</span>
                            <span x-show="!load">Update</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>

    @endforeach
</div>
