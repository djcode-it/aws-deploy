@props(['disabled' => false])

<textarea x-data="{ resize: () => { $el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px' } }"
          x-init="resize()"
          x-on:input="resize()" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full border-0 py-0 placeholder-gray-500 resize-none focus:ring-0 sm:text-sm']) !!} >{{$slot??''}}</textarea>
