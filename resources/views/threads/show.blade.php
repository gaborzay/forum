<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <a href="#">{{$thread->creator->name}}</a> posted:
                    {{$thread->title}}
                </h2>
                <div class="p-6 bg-white border-b border-gray-200">
                    {{$thread->body}}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($thread->replies as $reply)
                @include('threads.reply')
            @endforeach
        </div>
    </div>
</x-guest-layout>
