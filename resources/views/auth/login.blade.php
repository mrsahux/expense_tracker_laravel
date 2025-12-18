<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 to-purple-600">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md">

        <h2 class="text-3xl font-bold text-center mb-2">
            Welcome Back login page👋
        </h2>

        <p class="text-center text-gray-500 mb-6">
            Login to manage your expenses
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <input type="email" name="email" required
                       placeholder="Email"
                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <input type="password" name="password" required
                       placeholder="Password"
                       class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 font-semibold">
                Register
            </a>
        </p>

    </div>
</div>

</body>
</html>
