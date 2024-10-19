<div>
    <div class="bg-gray-50 border-2 border-gray-300 rounded-lg shadow-lg p-3 my-1">
        @if ($title)
            <h2 class="text-lg my-2 italic rounded-md  text-justify"><b>{{ $title }}</b></h2>
        @endif
        <div class="flex space-x-3">
            
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
