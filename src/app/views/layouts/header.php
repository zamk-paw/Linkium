<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkium Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-gray-900 flex flex-col justify-between">
        <div>
            <div class="p-4 text-2xl font-bold text-blue-400">Linkium</div>
            <nav class="mt-6 space-y-1">
                <a href="/dashboard/home" class="flex items-center px-4 py-2 hover:bg-gray-800 transition-colors">
                    <!-- Heroicon home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg>
                    Dashboard
                </a>
                <a href="/dashboard/contacts" class="flex items-center px-4 py-2 hover:bg-gray-800 transition-colors">
                    <!-- Heroicon contacts -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7.975 7.975 0 0 0 12 21a7.975 7.975 0 0 0 6.879-3.196M15 11a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    </svg>
                    Contacts
                </a>
            </nav>
        </div>

<div class="relative mt-auto border-t border-gray-800 p-4">
  <!-- Trigger button -->
  <button id="userMenuButton"
    class="w-full flex items-center justify-between px-3 py-2 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <div class="flex items-center space-x-3">
      <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">
        <?= strtoupper(substr($_SESSION['username'], 0, 1)); ?>
      </div>
      <div class="text-left">
        <div class="text-sm font-medium text-gray-100"><?= htmlspecialchars($_SESSION['username']); ?></div>
        <div class="text-xs text-gray-400"><?= htmlspecialchars($_SESSION['user_email'] ?? ''); ?></div>
      </div>
    </div>
    <!-- Chevron -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <!-- Dropdown menu that opens to the right -->
  <div id="userMenuDropdown"
    class="hidden absolute bottom-16 left-full ml-2 w-64 bg-gray-900 border border-gray-800 rounded-lg shadow-lg z-50">
    <div class="px-4 py-3 border-b border-gray-800">
      <div class="text-sm font-medium text-gray-100"><?= htmlspecialchars($_SESSION['username']); ?></div>
      <div class="text-xs text-gray-400"><?= htmlspecialchars($_SESSION['user_email'] ?? ''); ?></div>
    </div>
    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.05 0 3.976.441 5.707 1.195M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
      Account
    </a>
    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a5 5 0 00-10 0v2a2 2 0 01-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 01-2-2z" />
      </svg>
      Billing
    </a>
    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
      </svg>
      Notifications
    </a>
    <a href="/auth/logout" class="flex items-center px-4 py-2 text-sm text-red-400 hover:bg-gray-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
      </svg>
      Log out
    </a>
  </div>
</div>


<script>
  const userMenuButton = document.getElementById('userMenuButton');
  const userMenuDropdown = document.getElementById('userMenuDropdown');

  userMenuButton.addEventListener('click', (e) => {
    e.stopPropagation();
    userMenuDropdown.classList.toggle('hidden');
  });

  document.addEventListener('click', (e) => {
    if (!userMenuButton.contains(e.target) && !userMenuDropdown.contains(e.target)) {
      userMenuDropdown.classList.add('hidden');
    }
  });
</script>


    </aside>

    

    <!-- Main content -->
    <main class="flex-1">
