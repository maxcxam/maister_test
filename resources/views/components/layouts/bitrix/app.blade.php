<html>
<head>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <title>Bitrix module</title>
    @livewireStyles
</head>
<body>
<div class="container mx-auto">
    {{$slot}}
</div>
@livewireScripts
</body>
</html>
