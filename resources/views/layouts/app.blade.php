<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Groups</title>
    <!-- You can add CSS files here -->
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <!-- You can add navigation links here -->
        <a href="{{ route('category-groups.index') }}">Home</a>
    </nav>

    <div class="container">
        @yield('content')  <!-- This is where the content of other views will be injected -->
        @vite('resources/js/app.js')
    </div>

    <footer>
        <!-- Optional footer content here -->
    </footer>
</body>
</html>

