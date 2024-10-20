<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    @vite('resources/css/app.css') 
</head>
<body class="flex items-center justify-center min-h-screen bg-[#F2E5BF]">
    <div class="rounded-2xl p-6 flex flex-col bg-white w-full max-w-md">    
        <form action="{{ route('login') }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    {{ $errors->first() }} 
                </div>
            @endif

            <p class="text-2xl font-semibold mb-4">Sign In</p>

            <div class="flex flex-col gap-6 justify-center">
                <input type="email" name="email" placeholder="Email" class="rounded-xl p-2 border" required autofocus>
                <input type="password" name="password" placeholder="Password" class="rounded-xl p-2 border" required>
                <button type="submit" class="p-2 text-white bg-[#257180] rounded-xl font-semibold">Log In</button>
                <div class="flex space-x-1 text-sm">
                    <p>Don't have an account?</p>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register here</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
