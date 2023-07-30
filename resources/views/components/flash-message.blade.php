@if (session()->has('message'))
    <div class="fixed top-0 left-0 w-full p-5 bg-black text-white text-center opacity-70" x-data="{ open: true }"
        x-init="setTimeout(() => open = false, 3000)" x-show="open">
        <p>{{ session('message') }}</p>
    </div>
@endif
