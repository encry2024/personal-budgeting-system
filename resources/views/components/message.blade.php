@if(session('message'))
    <div class="mt-3 mb-3 p-3 bg-green-500 border-2 border-none rounded-md">
        <label class="text-white">{{ session('message') }}</label>
    </div>
@endif
