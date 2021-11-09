@extends('layouts.app')

@section('content')
<div class="grid grid-cols-4 h-full">
    <div class="relative col-span-1">
        <div class="inset-x-0 top-0 border border-black h-full">
        <div class="border border-yellow-900">
            Search
        </div>
            chats
        </div>
    </div>
    <div class="relative col-span-3 border border-black">
        <div class="border border-yellow-900">
            User info
        </div>
        <div class="h-full">
            messages
        </div>
        <div class="absolute inset-x-0 bottom-0">
           <div class="border border-black">
               Type something
           </div>
           <div class="absolute bottom-0 right-0 px-2">
               sendddd
           </div>
        </div>
    </div>
</div>
@endsection
