@if ($errors->any())
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="rounded-md bg-red-50 p-4" x-data="{show:true}" x-show="show" x-transition
         x-init="setTimeout(e => show = false,3500)">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: solid/x-circle -->
                <x-heroicon-o-x-circle class="w-5 text-red-400"/>

            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    There were {{$errors->count()}} errors with your submission:
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul role="list" class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endif
