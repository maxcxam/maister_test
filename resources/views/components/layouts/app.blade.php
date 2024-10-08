<html>
<head>
    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
{{$slot}}
</body>
</html>
