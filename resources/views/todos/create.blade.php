<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Todos</title>
</head>
<body>
    <div class="text-center pt-20">
        <h1 class="text-2xl">What The Next Task You want to Do!!</h1>
        <x-alert />
        <form method="post" action="/todos/create" class="py-5">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border rounded-lg"/>
            <input type="submit" value="create" class="p-2 border rounded-lg" />
        </form>
    </div>
</body>
</html>