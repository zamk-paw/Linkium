<?php include 'app/views/layouts/header.php'; ?>
<h2 class="text-2xl font-bold mb-4">Register</h2>
<?php if (!empty($error)): ?>
<p class="text-red-600 mb-2"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form action="/index.php?controller=auth&action=register" method="POST" class="max-w-md mx-auto space-y-4">
    <div>
        <label class="block mb-1">Username</label>
        <input type="text" name="username" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label class="block mb-1">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Create Account</button>
    <p class="mt-2 text-sm">
        Already have an account? <a class="text-blue-600" href="/index.php?controller=auth&action=login">Login</a>
    </p>
</form>
<?php include 'app/views/layouts/footer.php'; ?>
