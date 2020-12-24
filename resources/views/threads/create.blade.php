<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a New Thread
            </h2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/threads">
                        @csrf
                        <label for="channel_id">Choose one...</label>
                        <select name="channel_id" id="channel_id" required>
                            @foreach($channels as $channel)
                                <option value="{{$channel->id}}"
                                    {{old('channel_id') === $channel->id ? 'selected' : ''}}>
                                    {{$channel->name}}
                                </option>
                            @endforeach
                        </select>

                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" required>

                        <label for="body">Body:</label>
                        <textarea name="body" id="body" cols="30" rows="10" required>{{old('body')}}</textarea>

                        <button type="submit">Publish</button>
                    </form>

                    @if(count($errors))
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
