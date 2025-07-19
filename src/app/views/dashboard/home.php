<?php include 'app/views/layouts/header.php'; ?>

<div class="flex min-h-screen bg-gray-50">
    <?php include 'app/views/layouts/sidebar.php'; ?>

    <main class="ml-64 flex-1 p-8">
	<h1 class="text-3xl font-bold text-blue-700 mb-6">
    Welcome, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User'; ?> 👋
</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">Contacts</h2>
                <p class="text-gray-600 mb-4">Manage your saved contacts.</p>
                <a href="/index.php?controller=contact&action=index"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                    View Contacts
                </a>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">Entities</h2>
                <p class="text-gray-600 mb-4">Organize where you met people.</p>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                    Coming soon
                </button>
            </div>
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-blue-600 mb-2">Mind Map</h2>
                <p class="text-gray-600 mb-4">Visualize your network.</p>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                    Coming soon
                </button>
            </div>
        </div>
    </main>
</div>

<?php include 'app/views/layouts/footer.php'; ?>
