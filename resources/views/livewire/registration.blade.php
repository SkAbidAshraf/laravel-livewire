<div class="rounded border border-black max-w-md w-full bg-white">
    <div class="border-b border-black mb-4 py-3 text-center">
        <h1 class="text-xl">Register</h1>
        @if (session('successMessage'))
            <p class="text-green-600 text-sm">{{ session('successMessage') }}</p>
        @endif
    </div>

    <form wire:submit='create' class="p-4 pt-0">
        <div class="mb-4 grid grid-cols-12">
            <div class="col-span-4">
                <label for="name" class="text-sm">Full name:</label>
            </div>
            <div class="col-span-8">
                <input type="text" wire:model='name' id="name" name="name" placeholder="Enter your full name"
                    class="col-span-4 text-sm w-full border border-black p-1 rounded focus:outline-none focus:ring-1 focus:ring-black">
                @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 grid grid-cols-12">
            <div class="col-span-4">
                <label for="email" class="text-sm">Email address:</label>
            </div>
            <div class="col-span-8">
                <input type="email" wire:model='email' id="email" name="email"
                    placeholder="Enter your email adress"
                    class="text-sm w-full border border-black p-1 rounded focus:outline-none focus:ring-1 focus:ring-black">
                @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 grid grid-cols-12">
            <div class="col-span-4">
                <label for="password" class="text-sm text-nowrap">Select password:</label>
            </div>
            <div class="col-span-8">
                <input type="password" wire:model='password' id="password" name="password"
                    placeholder="Enter your password"
                    class="text-sm w-full border border-black p-1 rounded focus:outline-none focus:ring-1 focus:ring-black">
                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 grid grid-cols-12">
            <div class="col-span-4">
                <label for="password_confirmation" class="text-sm text-nowrap">Confirm password:</label>
            </div>
            <div class="col-span-8">
                <input type="password" wire:model='password_confirmation' id="password_confirmation"
                    name="password_confirmation" placeholder="Confirm your password"
                    class="text-sm w-full border border-black p-1 rounded focus:outline-none focus:ring-1 focus:ring-black">
                @error('password_confirmation')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 grid grid-cols-12">
            <div class="col-span-4">
                <label for="image" class="text-sm">Profile picture:</label>
            </div>
            <div class="col-span-8">
                <input wire:model='image' type="file" id="image" name="image" accept="image/png, image/jpg"
                    class="text-sm w-full border border-black p-1 rounded focus:outline-none focus:ring-1 focus:ring-black">

                @if ($image)
                    <div class="relative w-20 h-20 mt-2 border rounded">
                        <img src="{{ $image->temporaryUrl() }}" alt="profile picture"
                            class="w-full h-full rounded-sm object-cover">
                        <button type="button" wire:click='removeImage'
                            class="absolute top-0 right-0 bg-gray-100 m-0 text-white rounded-full size-4 flex items-center justify-center text-xs transform translate-x-1 -translate-y-1 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 37.690466 12.309534 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 13.390466 46 4 36.609534 4 25 C 4 13.390466 13.390466 4 25 4 z M 32.990234 15.986328 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.990234 15.986328 z">
                                </path>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="flex" wire:loading.delay.long wire:terget='image'>
                    <div class="w-20 h-20 mt-2 flex flex-col justify-around bg-gray-50 border rounded">
                        <div
                            class="border-gray-300 mx-auto align-middle h-10 w-10 animate-spin rounded-full border-4 border-t-blue-600">
                        </div>
                    </div>
                </div>

                @error('image')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="w-full bg-gray-100 border border-black py-1 rounded px-4 text-black hover:bg-gray-200 transition text-sm active:bg-gray-100">
            <span wire:loading.delay.long.remove wire:target='create'>Register</span>
            <span wire:loading.delay.long wire:target='create'>Loading...</span>
        </button>
    </form>

    <p class="text-center text-sm text-gray-600 mb-3">
        Already have an account? <a href="#" class="text-blue-600 hover:underline">Login</a>
        {{-- <div class="border-gray-300 h-8 w-8 animate-spin rounded-full border-4 border-t-blue-600"></div> --}}
    </p>
</div>
