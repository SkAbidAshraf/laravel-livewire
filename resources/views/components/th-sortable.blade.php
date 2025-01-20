<th scope="col" class="px-4 py-3">
    <div class="flex gap-x-1" wire:click='setSortField("{{ $fieldName }}")'>
        <div>{{ $colName }}</div>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="size-4" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8.25 15L12 18.75L15.75 15m-7.5-6L12 5.25L15.75 9" />
        </svg>
    </div>
</th>
