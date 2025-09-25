<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterTech</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJIjz3ix_nYZ2sGac4GW_-E-4f8_G-lNMu6Q&s">

    <script src="main.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>
<body>
    @include('Layouts.Header')
    <!-- test slide show -->
    @include('Layouts.SlideShow')

    <!-- close slide show -->
    <!-- <div>
        <img class="banner" src="./home_banner_1.webp" >
        <img class="banner1" src="./images (1).jpg">
    </div>  -->

    <!-- Scroll to Top Button -->
<button id="scrollTopBtn"
    class="hidden fixed bottom-6 right-6 z-50 p-3 rounded-full bg-blue-600 text-white shadow-lg
           hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
    <!-- Flowbite Icon (Heroicon) -->
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"></path>
    </svg>
</button>

    @include('Layouts.CardIntroduct')

    <Br>
    <h1 id="hot">HOT PROMOTION</h1>
    <hr style="width: 15%; margin-left: 42.5%;">
    @include('Layouts.ProductMaque')


    <h1 id="Categories0">CATEGORIES</h1>
    <hr style="width: 10%; margin-left: 45%;">
    @include('Layouts.ProductCategory')

    <!-- Product -->
    @include('Layouts.Product')
    <div style="background-color: black; margin-top: 20px;">
    @include('Layouts.Footer')
    </div>

<script>
   document.addEventListener("DOMContentLoaded", () => {
    const scrollTopBtn = document.getElementById("scrollTopBtn");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollTopBtn.classList.remove("hidden");
        } else {
            scrollTopBtn.classList.add("hidden");
        }
    });

    scrollTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});
</script>

</body>
</html>
