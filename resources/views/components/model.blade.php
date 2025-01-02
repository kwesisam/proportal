<div x-data="{ modalOpen: false }"
    @keydown.escape.window="modalOpen = false"
    :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
    {{ $slot }}
</div>