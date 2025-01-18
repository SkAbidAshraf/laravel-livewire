<div class="rounded border border-black w-full bg-white mx-auto">
    <div class="border-b border-black py-3 text-center">
        <h1 class="text-xl">All Posts</h1>
        @if (session('successMessage'))
            <p class="text-green-600 text-sm">{{ session('successMessage') }}</p>
        @endif
    </div>
    <table class="w-full">
        <thead>
            <tr class="border-b border-black text-left">
                <th class="px-1 border-r border-black">Title</th>
                <th class="px-1 border-r border-black">Content</th>
                <th class="px-1 border-r border-black">Image</th>
                <th class="px-1">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-black hover:bg-gray-100">
                <td class="p-1 border-r border-black">1</td>
                <td class="p-1 border-r border-black">2</td>
                <td class="p-1 border-r border-black">3</td>
                <td class="p-1 w-auto text-nowrap text-sm">
                    <button
                        class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Delete</button>
                    <button
                        class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Edit</button>
                </td>
            </tr>
            <tr class="border-b border-black hover:bg-gray-100">
                <td class="p-1 border-r border-black">1</td>
                <td class="p-1 border-r border-black">2</td>
                <td class="p-1 border-r border-black">3</td>
                <td class="p-1 w-auto text-nowrap text-sm">
                    <button
                        class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Delete</button>
                    <button
                        class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Edit</button>
                </td>
            </tr>
            <tr class="border-b border-black hover:bg-gray-100">
                <td class="p-1 border-r border-black">1</td>
                <td class="p-1 border-r border-black">2</td>
                <td class="p-1 border-r border-black">3</td>
                <td class="p-1 w-auto text-nowrap text-sm">
                    <button
                        class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Delete</button>
                    <button
                        class="bg-gray-100 border border-black rounded px-2 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">Edit</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
