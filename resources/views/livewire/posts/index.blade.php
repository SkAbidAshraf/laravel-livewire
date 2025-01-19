<div wire:poll.keep-alive class="w-full mx-auto bg-white border border-black rounded">
    <div class="py-3 text-center border-b border-black">
        <h1 class="text-xl">All Posts</h1>
        @if (session('message'))
            <p class="text-sm text-green-600">{{ session('message') }}</p>
        @endif
        <div class="flex justify-end px-1 mt-4">
            <div class="align-middle">
                <label for="search" class="mr-1 text-sm align-middle">search:</label>
            </div>

            <input type="text" wire:model.live.debounce.300ms='search' id="search" name="search"
                placeholder="search posts"
                class="p-1 text-sm border border-black rounded max-w-48 focus:outline-none focus:ring-1 focus:ring-black">
        </div>
    </div>
    <table class="w-full">
        <thead>
            <tr class="text-left border-b border-black">
                <th class="px-1 border-r border-black">#</th>
                <th class="px-1 border-r border-black min-w-20">Title</th>
                <th class="px-1 border-r border-black">Content</th>
                <th class="px-1 border-r border-black">Thumbnail</th>
                <th class="px-1">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($posts as $post)
                <tr class="border-b border-black">
                    <td class="p-1 align-top border-r border-black">{{ $post->id }}</td>
                    <td class="p-1 align-top border-r border-black">{{ $post->title }}</td>
                    <td class="p-1 align-top border-r border-black">{{ Str::limit($post->content, 100) }}</td>
                    <td class="p-1 align-top border-r border-black">
                        <div class="relative w-20 h-20 border rounded">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail"
                                class="object-cover w-full h-full rounded-sm">
                        </div>
                    </td>
                    <td class="w-auto p-1 text-sm align-top text-nowrap">
                        <button
                            class="px-2 text-sm text-black transition bg-gray-100 border border-black rounded hover:bg-gray-200 active:bg-gray-100"
                            onclick="if(confirm('Are you sure you want to delete this post?')) { @this.call('delete', {{ $post->id }}) }">
                            Delete
                        </button>

                        <button
                            class="px-2 text-sm text-black transition bg-gray-100 border border-black rounded hover:bg-gray-200 active:bg-gray-100">Edit</button>
                    </td>
                </tr>
            @empty
                <tr class="border-b border-black">
                    <td class="p-1 text-center align-top border-r border-black" colspan="5">
                        @if ($search)
                            <p class="text-sm text-gray-500">No posts found with the search term
                            </p>
                        @else
                            <p class="text-sm text-gray-500">No posts found</p>
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="p-1 min-h-5">
        {{ $posts->links() }}
    </div>
</div>
