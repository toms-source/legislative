<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Available Ordinance</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles

    <!-- fontawsome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="p-5 fs-4 fw-bolder" style="background-color: #3d4ecc; color: white; box-shadow: -1px -5px 36px -4px rgba(69,69,69,0.75);
-webkit-box-shadow: -1px -5px 36px -4px rgba(69,69,69,0.75);
-moz-box-shadow: -1px -5px 36px -4px rgba(69,69,69,0.75);"><i class="fa-solid fa-scale-unbalanced" style="color: #ffffff; padding: 5px"></i>BND Legislative
    </div>
    <div class="card m-5">
        <div class="">
                <h2 class="text-center pt-5 fw-bold">Available Ordinance</h2>    
        </div>
        <div class="container">
                <div class="mt-3">@livewire('search-form')</div>
                @livewire('userview')
        </div>
   </div>
    @livewireScripts
</body>
</html>