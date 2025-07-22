<?php include 'app/views/layouts/header.php'; ?>
<div class="flex-1 p-8 bg-gray-950 min-h-screen text-gray-100">
  <!-- Header section -->
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-bold">Welcome back, <?= htmlspecialchars($_SESSION['username']); ?> 👋</h1>
    <a href="/dashboard/addContacts"
       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
      </svg>
      Add Contact
    </a>
  </div>

  <!-- Stats cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="p-6 rounded-lg bg-gray-900 shadow hover:shadow-lg transition">
      <h2 class="text-sm text-gray-400">Total Contacts</h2>
      <p class="text-2xl font-bold mt-2">128</p>
      <p class="text-xs text-gray-500 mt-1">+12 this month</p>
    </div>
    <div class="p-6 rounded-lg bg-gray-900 shadow hover:shadow-lg transition">
      <h2 class="text-sm text-gray-400">Active Entities</h2>
      <p class="text-2xl font-bold mt-2">8</p>
      <p class="text-xs text-gray-500 mt-1">Schools, jobs, etc.</p>
    </div>
    <div class="p-6 rounded-lg bg-gray-900 shadow hover:shadow-lg transition">
      <h2 class="text-sm text-gray-400">Mind Map Nodes</h2>
      <p class="text-2xl font-bold mt-2">42</p>
      <p class="text-xs text-gray-500 mt-1">Growing your network</p>
    </div>
  </div>

  <!-- Recent activity / table -->
  <div class="bg-gray-900 rounded-lg shadow p-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold">Recent Contacts</h3>
      <a href="/dashboard/contacts" class="text-sm text-blue-500 hover:underline">View all</a>
    </div>
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead>
          <tr class="text-left text-gray-400 border-b border-gray-700">
            <th class="pb-3">Name</th>
            <th class="pb-3">Email</th>
            <th class="pb-3">Added</th>
          </tr>
        </thead>
        <tbody class="text-gray-200">
          <tr class="border-b border-gray-800 hover:bg-gray-800">
            <td class="py-3">John Doe</td>
            <td class="py-3">john@example.com</td>
            <td class="py-3">2025-07-18</td>
          </tr>
          <tr class="border-b border-gray-800 hover:bg-gray-800">
            <td class="py-3">Jane Smith</td>
            <td class="py-3">jane@example.com</td>
            <td class="py-3">2025-07-17</td>
          </tr>
          <tr class="hover:bg-gray-800">
            <td class="py-3">Alex Brown</td>
            <td class="py-3">alex@example.com</td>
            <td class="py-3">2025-07-15</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php include 'app/views/layouts/footer.php'; ?>
