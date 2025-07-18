<?php include 'app/views/layouts/header.php'; ?>
<h2 class="text-2xl font-bold mb-4">Login</h2>

<form action="/auth/login_handler.php" method="POST" class="max-w-md mx-auto space-y-4">
    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block mb-1">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
    <p class="mt-2 text-sm">No account? <a href="/index.php?controller=auth&action=register" class="text-blue-600">Register here</a></p>
</form>
<?php include 'app/views/layouts/footer.php'; ?>
