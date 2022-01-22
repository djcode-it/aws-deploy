@if (session('success'))
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-data="{show:true}" x-show="show" x-transition x-init="setTimeout(e => show = false,2500)"
         class="rounded-md bg-green-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <x-heroicon-o-check-circle class="w-5 text-green-400"/>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-green-800">
                    {{session('success')}}
                </h3>
            </div>
        </div>
    </div>
@endif
