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
