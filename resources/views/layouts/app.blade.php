
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    @vite('resources/js/app.js')
</head>
<body class="antialiased">
    <div class="min-h-full flex flex-col justify-between">
        <div>
            @include('sections.nav')
        
            <div class="py-10">
                <header>
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">@yield('title')</h1>
                    </div>
                </header>
                <main>
                    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                        @yield('content')
                    </div>
                </main>
            </div>    
        </div>
        
        <footer>
            <p>
                Copyright &copy; 2020 All Rights Reserved.
            </p>
        </footer>

    </div>
</body>
</html>


