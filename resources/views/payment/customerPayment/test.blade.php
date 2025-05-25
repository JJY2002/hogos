<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Test Flex</title>
    @vite('resources/css/app.css') <!-- or however you load Tailwind -->
</head>
<body class="bg-gray-100 p-6">

    <div class="flex space-x-2 w-full bg-gray-300 p-4">
        <div class="bg-black p-4 flex-1 text-white">
            Box 1
        </div>
        <div class="bg-black p-4 flex-1 text-white">
            Box 2
        </div>
    </div>

</body>
</html>