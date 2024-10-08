<html>
<head>
    @livewireStyles
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    @livewireScripts
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
@yield('layout')

@livewireScriptConfig
</body>
</html>
