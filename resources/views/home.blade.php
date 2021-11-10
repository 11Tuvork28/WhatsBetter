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

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="absolute inset-x-0 bottom-0">
        <input class="shadow appearance-none border rounded w-full py-8 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Type Something">
        </div>
        <div class="absolute bottom-0 right-0 px-2 pb-5">
               <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">send</button>
           </div>
        </form>
           </div>
           
</div>
@endsection
