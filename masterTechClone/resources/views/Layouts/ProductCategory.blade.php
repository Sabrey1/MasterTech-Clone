{{-- <div class="Categories">
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
        <div class="Categories1">
            <img src="./images.jpg">
            <p>Model: 1</p>
            <p>Price: 1000$</p>
        </div>
    </div> --}}
@php
    use Illuminate\Support\Str;
@endphp

<div>
    @foreach ($categories as $category)
        <div class="bg-gray-300">
            {{$category->image}}
            <h2>{{ $category->name}}</h2>
            <p>{{ Str::limit($category->description, 100, '...') }}</p>
        </div>
    @endforeach
</div>
