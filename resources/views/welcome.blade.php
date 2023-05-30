<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordinance Details</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

   <div>
        <h2 class="text-center">Ordinance Details</h2>
        
   </div>



    <div class="container">
        @livewire('ordinance-list')
    </div>

    @livewireScripts
</body>
</html>