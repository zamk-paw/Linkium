<?php include 'app/views/layouts/header.php'; ?>
<div class="flex min-h-screen bg-gray-50">
    <?php include 'app/views/layouts/sidebar.php'; ?>

    <main class="ml-64 flex-1 p-8">
        <h1 class="text-3xl font-bold text-blue-700 mb-6">Add Contact</h1>

        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Contact creation form -->
        <form action="/dashboard/storeContact" method="POST" class="space-y-4 max-w-2xl">
            <!-- Required fields -->
            <div>
                <label class="block font-medium">First Name *</label>
                <input type="text" name="first_name" required class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Last Name *</label>
                <input type="text" name="last_name" required class="w-full border p-2 rounded">
            </div>

            <!-- Optional fields -->
            <div>
                <label class="block font-medium">Nickname</label>
                <input type="text" name="nickname" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Description</label>
                <textarea name="description" class="w-full border p-2 rounded"></textarea>
            </div>
            <div>
                <label class="block font-medium">Tags (comma separated)</label>
                <input type="text" name="tags" class="w-full border p-2 rounded">
            </div>

            <!-- Emails -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Email Personal</label>
                    <input type="email" name="email_personal" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium">Email Professional</label>
                    <input type="email" name="email_professional" class="w-full border p-2 rounded">
                </div>
            </div>

            <!-- Phones -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Phone Personal</label>
                    <input type="text" name="phone_personal" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium">Phone Professional</label>
                    <input type="text" name="phone_professional" class="w-full border p-2 rounded">
                </div>
            </div>

            <!-- Socials -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-medium">GitHub URL</label>
                    <input type="text" name="github_url" class="w-full border p-2 rounded">
                </div>
            </div>

            <!-- Company and position -->
            <div>
                <label class="block font-medium">Company</label>
                <input type="text" name="company" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Position</label>
                <input type="text" name="position" class="w-full border p-2 rounded">
            </div>

            <!-- Address and birthday -->
            <div>
                <label class="block font-medium">Address</label>
                <input type="text" name="address" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Birthday</label>
                <input type="date" name="birthday" class="w-full border p-2 rounded">
            </div>

            <!-- Website and notes -->
            <div>
                <label class="block font-medium">Website URL</label>
                <input type="text" name="website_url" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Notes</label>
                <textarea name="notes" class="w-full border p-2 rounded"></textarea>
            </div>

            <!-- Source and relationship -->
            <div>
                <label class="block font-medium">Source</label>
                <input type="text" name="source" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-medium">Relationship</label>
                <select name="relationship" class="w-full border p-2 rounded">
                    <option value="">Select...</option>
                    <option value="pro">Professional</option>
                    <option value="perso">Personal</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Submit button -->
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
                Save Contact
            </button>
        </form>
    </main>
</div>
<?php include 'app/views/layouts/footer.php'; ?>
