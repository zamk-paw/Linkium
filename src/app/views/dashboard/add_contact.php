<?php include 'app/views/layouts/header.php'; ?>
<div class="flex h-screen bg-gray-950 text-gray-100">
  <!-- Main content scrollable -->
  <main class="flex-1 overflow-y-auto">
    <div class="p-8 min-h-full">
      <!-- Header -->
      <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold">Add a New Contact</h1>
        <a href="/dashboard/contacts"
           class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-200 text-sm font-medium rounded-lg shadow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          Back to Contacts
        </a>
      </div>
      <?php if (!empty($error)): ?>
        <div class="bg-red-900 text-red-200 p-3 rounded mb-6 border border-red-700">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form action="/dashboard/storeContact" method="POST" class="space-y-8">

        <!-- Basic Information -->
        <div class="bg-gray-900 rounded-lg border border-gray-800 p-6 space-y-4 shadow">
          <h2 class="text-xl font-semibold text-blue-300 mb-2">Basic Information</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">First Name *</label>
              <input type="text" name="first_name" required
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Last Name *</label>
              <input type="text" name="last_name" required
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Nickname</label>
              <input type="text" name="nickname"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Tags</label>
              <input type="text" name="tags"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description"
                      class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="bg-gray-900 rounded-lg border border-gray-800 p-6 space-y-4 shadow">
          <h2 class="text-xl font-semibold text-blue-300 mb-2">Contact Info</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Email Personal</label>
              <input type="email" name="email_personal"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Email Professional</label>
              <input type="email" name="email_professional"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Phone Personal</label>
              <input type="text" name="phone_personal"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Phone Professional</label>
              <input type="text" name="phone_professional"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
        </div>

        <!-- Social & Company -->
        <div class="bg-gray-900 rounded-lg border border-gray-800 p-6 space-y-4 shadow">
          <h2 class="text-xl font-semibold text-blue-300 mb-2">Social & Company</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">LinkedIn URL</label>
              <input type="text" name="linkedin_url"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">GitHub URL</label>
              <input type="text" name="github_url"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Company</label>
              <input type="text" name="company"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Position</label>
              <input type="text" name="position"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
        </div>

        <!-- Address & Misc -->
        <div class="bg-gray-900 rounded-lg border border-gray-800 p-6 space-y-4 shadow">
          <h2 class="text-xl font-semibold text-blue-300 mb-2">Address & Other</h2>
          <div>
            <label class="block text-sm font-medium mb-1">Address</label>
            <input type="text" name="address"
                   class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Birthday</label>
              <input type="date" name="birthday"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Website URL</label>
              <input type="text" name="website_url"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Notes</label>
            <textarea name="notes"
                      class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Source</label>
              <input type="text" name="source"
                     class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-medium mb-1">Relationship</label>
              <select name="relationship"
                      class="w-full bg-gray-800 border border-gray-700 p-2 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">Select...</option>
                <option value="pro">Professional</option>
                <option value="perso">Personal</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Submit -->
        <div class="pt-4">
          <button type="submit"
                  class="bg-blue-600 text-white px-6 py-3 rounded-md text-lg font-medium hover:bg-blue-500 transition-colors">
            Save Contact
          </button>
        </div>

      </form>
    </div>
  </main>
</div>
<?php include 'app/views/layouts/footer.php'; ?>
