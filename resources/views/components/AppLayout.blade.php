<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>House of Grill</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @section("scripts")
        @parent
    @show
</head>
<body>
    <x-header />
</body>
</html>
