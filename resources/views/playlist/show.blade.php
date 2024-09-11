<x-app-layout>
    <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
        <div class="flex justify-between">
            <div>
                <a class="font-bold text-xl mb-2" href="{{ route('playlist.show', $playlist->id) }}">
                    {{ $playlist->name }}
                </a>
                <div class="px-6 pt-4 pb-2">
                    <span
                        class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('playlist.edit', $playlist->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            <table class="w-full table-auto rounded ">
                <thead class="bg-gray-700 text-white p-4 ">
                    <tr class="">
                        <td class="py-1 px-2 ">Title</td>
                        <td>Artist</td>
                        <td>Genre</td>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($playlist->songs as $song)
                    <tr class="even:bg-blue-50">

                        <td class="text-xl">{{$song->title}}</td>
                        <td>{{$song->artist}}</td>
                        <td>{{$song->genre}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Add SONG -->
            <form action=" {{route('playlist.addSong',   $playlist->id )}}" class="flex w-full gap-4"
                method="post">
                @csrf

                <select name="song_id" class="w-[50%]">
                    <option selected value="">--Please choose an option--</option>
                    @foreach ($avalibleSongs as $song)
                    <option value="{{$song->id}}">{{$song->title}} by {{$song->artist}}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-green-400 rounded py-2 px-4 font-bold text-white">Add song</button>
            </form>

        </div>
    </div>
    </div>
</x-app-layout>