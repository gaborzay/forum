<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$thread->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($thread->replies as $reply)
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <a href="#">
                        {{$reply->owner->name}}
                    </a> said {{$reply->created_at->diffForHumans()}}
                </h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{$reply->body}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
