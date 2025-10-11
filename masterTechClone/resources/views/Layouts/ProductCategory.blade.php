
{{-- @php
    use Illuminate\Support\Str;
@endphp --}}
{{--
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
    @foreach ($categories as $category)
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition-all duration-300">
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $category->name }}</h2>
                <p class="text-gray-600 text-sm">{{ Str::limit($category->description, 100, '...') }}</p>
                <div class="mt-3">
                    <a href="#" class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700">
                        View More
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 p-6">
    @foreach($categories as $category)
     <div class="bg-white shadow-md hover:shadow-lg overflow-hidden transition-all duration-300">
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg text-center  font-semibold text-gray-800 mb-2">{{ $category->name }}</h2>
                {{-- <p class="text-gray-600 text-sm">{{ Str::limit($category->description, 100, '...') }}</p> --}}

            </div>
        </div>
    @endforeach
</div>

