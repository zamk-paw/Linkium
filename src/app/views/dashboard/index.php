<?php include 'app/views/layouts/header.php'; ?>

<div class="flex">
    <?php include 'app/views/layouts/sidebar.php'; ?>

    <main class="ml-64 p-6 flex-1">
        <h1 class="text-3xl font-bold mb-4">Welcome, <?= htmlspecialchars($_SESSION['username']); ?> 👋</h1>
        <p class="text-gray-700">This is your Linkium dashboard. From here you can manage your contacts, entities, and more!</p>

        <!-- Tu pourras ajouter des widgets ou des stats ici -->
    </main>
</div>

<?php include 'app/views/layouts/footer.php'; ?>
