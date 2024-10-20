<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-[#F2E5BF]">
    <div class="rounded-2xl p-6 flex flex-col bg-white w-full max-w-md">    
        <form method="POST" action="{{ route('register') }}">
            @csrf 

            <p class="text-2xl font-semibold mb-4">Sign Up</p>

            <div class="flex flex-col gap-6">
                <input type="text" name="name" placeholder="Enter your name" class="rounded-xl p-2 border" required autofocus>
                <input type="email" name="email" placeholder="Enter your email" class="rounded-xl p-2 border" required>
                <input type="password" name="password" placeholder="Enter your password" class="rounded-xl p-2 border" required>
                <input type="password" name="password_confirmation" placeholder="Confirm your password" class="rounded-xl p-2 border" required>

                @if($errors->any())
                    <div class="text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="p-1 text-white bg-[#257180] rounded-xl font-semibold">Register</button>
            </div>
        </form>
        
        <div class="mt-4 text-center">
            <p class="text-sm">Already registered? 
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>
