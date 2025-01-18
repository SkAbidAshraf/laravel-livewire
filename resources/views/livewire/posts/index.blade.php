<div wire:poll.keep-alive class="rounded border border-black w-full bg-white mx-auto">
    <div class="border-b border-black py-3 text-center">
        <h1 class="text-xl">All Posts</h1>
        @if (session('message'))
            <p class="text-green-600 text-sm">{{ session('message') }}</p>
        @endif
    </div>
    <table class="w-full">
        <thead>
            <tr class="border-b border-black text-left">
                <th class="px-1 border-r border-black">#</th>
                <th class="px-1 border-r border-black min-w-20">Title</th>
                <th class="px-1 border-r border-black">Content</th>
                <th class="px-1 border-r border-black">Thumbnail</th>
                <th class="px-1">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr class="border-b border-black">
                    <td class="p-1 border-r border-black align-top">{{ $post->id }}</td>
                    <td class="p-1 border-r border-black align-top">{{ $post->title }}</td>
                    <td class="p-1 border-r border-black align-top">{{ Str::limit($post->content, 100) }}</td>
                    <td class="p-1 border-r border-black align-top">
                        <div class="relative w-20 h-20 border rounded">
                            <img src="{{ asset( 'storage/'.$post->thumbnail) }}" alt="thumbnail"
                                class="w-full h-full rounded-sm object-cover">
                        </div>
                    </td>
                    <td class="p-1 w-auto text-nowrap text-sm align-top">
                        <button
                            class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100"
                            onclick="if(confirm('Are you sure you want to delete this post?')) { @this.call('delete', {{ $post->id }}) }">
                            Delete
                        </button>

                        <button
                            class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-1 min-h-5">
        {{ $posts->links() }}
    </div>
</div>
