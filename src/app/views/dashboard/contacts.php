<?php include 'app/views/layouts/header.php'; ?>

<div class="flex h-screen bg-gray-950 text-gray-100">
  <!-- Left sidebar list -->
  <div class="w-1/3 border-r border-gray-800 flex flex-col">
    <div class="p-4 border-b border-gray-800">
      <h2 class="text-lg font-semibold text-gray-200 mb-3">Contacts</h2>
      <input id="searchInput" type="text" placeholder="Search..."
             onkeyup="filterContacts()"
             class="w-full px-3 py-2 rounded-md bg-gray-800 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring focus:ring-blue-500">
    </div>
    <ul id="contactList" class="flex-1 overflow-y-auto divide-y divide-gray-800">
      <?php foreach($contacts as $Contacts): ?>
        <li class="cursor-pointer hover:bg-gray-800 px-4 py-3"
            data-id="<?= $Contacts->getId() ?>"
            data-fullname="<?= htmlspecialchars($Contacts->getFullName()) ?>"
            data-nickname="<?= htmlspecialchars($Contacts->getNickname() ?? '') ?>"
            data-description="<?= htmlspecialchars($Contacts->getDescription() ?? '') ?>"
            data-tags="<?= htmlspecialchars($Contacts->getTags() ?? '') ?>"
            data-email="<?= htmlspecialchars($Contacts->getEmailPersonal() ?? '') ?>"
            data-emailpro="<?= htmlspecialchars($Contacts->getEmailProfessional() ?? '') ?>"
            data-phonepersonal="<?= htmlspecialchars($Contacts->getPhonePersonal() ?? '') ?>"
            data-phonepro="<?= htmlspecialchars($Contacts->getPhoneProfessional() ?? '') ?>"
            data-linkedin="<?= htmlspecialchars($Contacts->getLinkedinUrl() ?? '') ?>"
            data-github="<?= htmlspecialchars($Contacts->getGithubUrl() ?? '') ?>"
            data-company="<?= htmlspecialchars($Contacts->getCompany() ?? '') ?>"
            data-position="<?= htmlspecialchars($Contacts->getPosition() ?? '') ?>"
            data-address="<?= htmlspecialchars($Contacts->getAddress() ?? '') ?>"
            data-birthday="<?= htmlspecialchars($Contacts->getBirthday() ?? '') ?>"
            data-website="<?= htmlspecialchars($Contacts->getWebsiteUrl() ?? '') ?>"
            data-notes="<?= htmlspecialchars($Contacts->getNotes() ?? '') ?>"
            data-source="<?= htmlspecialchars($Contacts->getSource() ?? '') ?>"
            data-relationship="<?= htmlspecialchars($Contacts->getRelationship() ?? '') ?>">
          <div class="font-medium text-gray-200"><?= htmlspecialchars($Contacts->getFullName()) ?></div>
          <?php if ($Contacts->getEmailPersonal()): ?>
            <div class="text-xs text-gray-400"><?= htmlspecialchars($Contacts->getEmailPersonal()) ?></div>
          <?php elseif ($Contacts->getEmailProfessional()): ?>
            <div class="text-xs text-gray-400"><?= htmlspecialchars($Contacts->getEmailProfessional()) ?></div>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- Right detail panel -->
  <div class="flex-1 p-6 overflow-y-auto">
    <div id="contactDetails" class="h-full flex flex-col justify-center items-center text-gray-400">
      <p class="text-gray-500">Select a contact to view details</p>
    </div>
  </div>
</div>

<script>
// Helper for SVG icon
const icon = (path) => `
  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    ${path}
  </svg>
`;

const contactItems = document.querySelectorAll('#contactList li');
const detailsPanel = document.getElementById('contactDetails');

contactItems.forEach(item => {
  item.addEventListener('click', () => {
    const d = item.dataset;

    // Boutons d'action (delete)
    const deleteButton = `
      <button onclick="openDeleteModal('${d.id}', '${d.fullname}')"
              class="ml-auto inline-flex items-center px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Delete
      </button>
    `;

    detailsPanel.innerHTML = `
      <div class="w-full max-w-4xl space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-4">
          <div class="h-16 w-16 rounded-full bg-blue-600 flex items-center justify-center text-2xl font-semibold">
            ${d.fullname.charAt(0).toUpperCase()}
          </div>
          <div>
            <h3 class="text-2xl font-bold text-gray-100">${d.fullname}</h3>
            ${d.nickname ? `<p class="text-sm text-gray-400 italic">"${d.nickname}"</p>` : ""}
            ${d.description ? `<p class="text-sm text-gray-400">${d.description}</p>` : ""}
          </div>
        </div>

        ${d.tags ? `
        <div>
          <h4 class="text-sm font-semibold text-gray-300 mb-2">Tags</h4>
          <p class="text-sm text-gray-400">${d.tags}</p>
        </div>` : ""}

        <!-- Grid with two panels -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="p-4 bg-gray-900 rounded-md shadow space-y-2">
            <h4 class="text-sm font-semibold text-gray-300 mb-2">Personal Info</h4>
            ${d.email ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4"/>')}<span>${d.email}</span></p>` : ""}
            ${d.phonepersonal ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.684l1.1 3.293a1 1 0 01-.216.98l-2.12 2.12a11.042 11.042 0 005.516 5.516l2.12-2.12a1 1 0 01.98-.216l3.293 1.1a1 1 0 01.684.95V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>')}<span>${d.phonepersonal}</span></p>` : ""}
            ${d.address ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12m0 0l4.243-4.243m-4.243 4.243L9.172 7.757m4.242 4.243L7.757 16.657M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>')}<span>${d.address}</span></p>` : ""}
            ${d.birthday ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-6 4h6m-9 4h9m2 4H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2z"/>')}<span>${d.birthday}</span></p>` : ""}
          </div>

          <div class="p-4 bg-gray-900 rounded-md shadow space-y-2">
            <h4 class="text-sm font-semibold text-gray-300 mb-2">Professional Info</h4>
            ${d.emailpro ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4"/>')}<span>${d.emailpro}</span></p>` : ""}
            ${d.phonepro ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.684l1.1 3.293a1 1 0 01-.216.98l-2.12 2.12a11.042 11.042 0 005.516 5.516l2.12-2.12a1 1 0 01.98-.216l3.293 1.1a1 1 0 01.684.95V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>')}<span>${d.phonepro}</span></p>` : ""}
            ${d.company ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m9 4a9 9 0 11-18 0 9 9 0 0118 0z"/>')}<span>${d.company}</span></p>` : ""}
            ${d.position ? `<p class="flex items-center text-sm text-gray-400">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>')}<span>${d.position}</span></p>` : ""}
          </div>
        </div>

        <!-- Links -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          ${d.linkedin ? `<a href="${d.linkedin}" target="_blank" class="flex items-center p-4 bg-gray-900 rounded-md shadow hover:bg-gray-800">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8a6 6 0 11-12 0 6 6 0 0112 0zM12 14a9 9 0 00-9 9h18a9 9 0 00-9-9z"/>')}<span>LinkedIn</span></a>` : ""}
          ${d.github ? `<a href="${d.github}" target="_blank" class="flex items-center p-4 bg-gray-900 rounded-md shadow hover:bg-gray-800">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 00-3.16 19.49c.5.09.68-.22.68-.48v-1.68c-2.78.6-3.37-1.34-3.37-1.34a2.65 2.65 0 00-1.1-1.45c-.9-.62.07-.6.07-.6a2.1 2.1 0 011.54 1.03 2.14 2.14 0 002.93.84 2.1 2.1 0 01.64-1.34c-2.22-.25-4.56-1.11-4.56-4.95a3.9 3.9 0 011.03-2.7 3.6 3.6 0 01.1-2.66s.84-.27 2.75 1.02a9.58 9.58 0 015 0c1.9-1.29 2.74-1.02 2.74-1.02a3.6 3.6 0 01.1 2.66 3.9 3.9 0 011.03 2.7c0 3.85-2.34 4.7-4.57 4.95a2.36 2.36 0 01.67 1.83v2.71c0 .26.18.58.69.48A10 10 0 0012 2z"/>')}<span>GitHub</span></a>` : ""}
          ${d.website ? `<a href="${d.website}" target="_blank" class="flex items-center p-4 bg-gray-900 rounded-md shadow hover:bg-gray-800">${icon('<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"/>')}<span>Website</span></a>` : ""}
        </div>

        ${d.notes ? `
        <div class="p-4 bg-gray-900 rounded-md shadow">
          <h4 class="text-sm font-semibold text-gray-300 mb-2">Notes</h4>
          <p class="text-sm text-gray-400">${d.notes}</p>
        </div>` : ""}

        ${(d.source || d.relationship) ? `
        <div class="p-4 bg-gray-900 rounded-md shadow">
          ${d.source ? `<p class="text-sm text-gray-400">Source: ${d.source}</p>` : ""}
          ${d.relationship ? `<p class="text-sm text-gray-400">Relationship: ${d.relationship}</p>` : ""}
        </div>` : ""}
        ${deleteButton}

      </div>
    `;
  });
});

function openDeleteModal(id, name) {
  const actions = `
    <button onclick="closeModal()" class="px-4 py-2 bg-gray-700 text-gray-200 rounded hover:bg-gray-600">Cancel</button>
    <form method="POST" action="/contacts/delete" class="inline">
      <input type="hidden" name="contact_id" value="${id}">
      <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
    </form>
  `;
  openModal('Delete Contact', `Are you sure you want to delete ${name}?`, actions);
}

function filterContacts() {
  const input = document.getElementById('searchInput').value.toLowerCase();
  const contacts = document.querySelectorAll('#contactList li');
  contacts.forEach(contacts => {
    const text = Contacts.textContent.toLowerCase();
    Contacts.style.display = text.includes(input) ? '' : 'none';
  });
}
</script>

<?php include 'app/views/layouts/footer.php'; ?>
