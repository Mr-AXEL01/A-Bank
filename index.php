<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>A-Bank</title>
    
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <span class="text-2xl font-bold">A-Bank</span>
            <div>
                <a href="#" class="mx-2">About</a>
                <a href="#" class="mx-2">Contact Us</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto mt-8 h-[81vh]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-4xl font-bold mb-4">Welcome to A-Bank</h1>
                <p class="text-gray-700">Your trusted partner in banking services.</p>
            </div>
            
            <div>
                <form action="login.php" method="post" class="bg-white p-8 rounded-md shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Login</h2>
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                        <input type="text" name="username" required class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                        <input type="password" name="password" required class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Login</button>
                </form>
                <p class="mt-4 text-gray-700">Don't have an account? <a href="register.php" class="text-blue-500">Register here</a>.</p>
            </div>
        </div>
    </div>
    <footer class="mt-8 bg-blue-500 p-4 text-white">
        <div class="container mx-auto text-center">
            &copy; <?= date('Y') ?> A-Bank. All rights reserved.
        </div>
    </footer>
</body>
</html>
