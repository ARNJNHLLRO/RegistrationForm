<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

</head>
<body> 
    <div id="app">
        <div class="registration-container">
            <router-view> </router-view>
        </div>
    </div>   
    
    <script src="{{ asset('js/app.js') }}" defer></script> 
</body>
</html>