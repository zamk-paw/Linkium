<?php include 'app/views/layouts/auth_header.php'; ?>
<div class="min-h-screen flex items-center justify-center bg-gray-950">
    <div class="w-full max-w-md bg-gray-900 rounded-xl shadow-lg p-8">
        <!-- Logo / Icon -->
        <div class="flex justify-center mb-6">
            <!-- Replace with your own SVG/logo -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 11c0-3 2-5 5-5s5 2 5 5c0 3-2 5-5 5s-5-2-5-5zM2 12c0-3 2-5 5-5s5 2 5 5c0 3-2 5-5 5s-5-2-5-5z" />
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-gray-100 text-center mb-6">Sign in to Linkium</h1>

        <?php if (!empty($error)): ?>
            <div class="mb-4 bg-red-600/20 text-red-400 border border-red-500 rounded p-3 text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="/auth/login" method="POST" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 focus:outline-none focus:border-blue-500"
                       placeholder="you@example.com" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-gray-100 focus:outline-none focus:border-blue-500"
                       placeholder="••••••••" required>
            </div>

            <button type="submit"
                    class="w-full py-2 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded-lg transition-colors">
                Sign In
            </button>

            <p class="text-center text-sm text-gray-400 mt-4">
                Don't have an account?
                <a href="/auth/register" class="text-blue-400 hover:underline">Create one</a>
            </p>
        </form>
    </div>
</div>
<?php include 'app/views/layouts/auth_footer.php'; ?>
