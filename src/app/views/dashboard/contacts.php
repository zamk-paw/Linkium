<?php include 'app/views/layouts/header.php'; ?>

<div class="flex min-h-screen bg-gray-50">
    <?php include 'app/views/layouts/sidebar.php'; ?>

    <main class="ml-64 flex-1 p-8">
        <h1 class="text-3xl font-bold text-blue-700 mb-6">📒 Contacts</h1>

        <!-- Search bar -->
        <div class="mb-6">
            <input
                type="text"
                id="searchInput"
                placeholder="Search contacts..."
                class="w-full md:w-1/2 border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-400"
                onkeyup="filterContacts()"
            >
        </div>

        <!-- Contacts list -->
        <div id="contactsList" class="space-y-4">
            <?php if (!empty($contacts)): ?>
		<?php foreach ($contacts as $contact): ?>
    <div class="bg-white shadow rounded-lg p-4 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-blue-600">
                <?= htmlspecialchars($contact->getFullName()) ?>
            </h2>
            <?php if ($contact->getEmailPersonal()): ?>
                <p class="text-gray-600 text-sm">
                    <?= htmlspecialchars($contact->getEmailPersonal()) ?>
                </p>
            <?php endif; ?>
            <?php if ($contact->getEmailProfessional()): ?>
                <p class="text-gray-600 text-sm">
                    Pro: <?= htmlspecialchars($contact->getEmailProfessional()) ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
	    
<?php else: ?>
                <p class="text-gray-600">No contacts yet.</p>
	    <?php endif; ?>

        </div>
    </main>
</div>

<script>
// Simple client-side filter
function filterContacts() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const contacts = document.querySelectorAll('#contactsList > div');

    contacts.forEach(contact => {
        const text = contact.textContent.toLowerCase();
        contact.style.display = text.includes(filter) ? '' : 'none';
    });
}

</script>

<?php include 'app/views/layouts/footer.php'; ?>
