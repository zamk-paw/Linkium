<!-- Modal Component -->
<div id="globalModal"
     class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
  <div class="bg-gray-900 rounded-lg p-6 w-full max-w-md border border-gray-700 shadow-lg">
    <h2 id="modalTitle" class="text-xl font-bold mb-4 text-gray-100">Modal Title</h2>
    <p id="modalMessage" class="text-gray-300 mb-6">Modal content...</p>
    <div id="modalActions" class="flex justify-end space-x-4">
      <!-- Buttons will be injected dynamically -->
    </div>
  </div>
</div>

<script>
  const globalModal = document.getElementById('globalModal');
  const modalTitle = document.getElementById('modalTitle');
  const modalMessage = document.getElementById('modalMessage');
  const modalActions = document.getElementById('modalActions');

  function openModal(title, message, actionsHtml) {
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    modalActions.innerHTML = actionsHtml;
    globalModal.classList.remove('hidden');
  }

  function closeModal() {
    globalModal.classList.add('hidden');
  }

  // Close when clicking outside
  globalModal.addEventListener('click', (e) => {
    if (e.target === globalModal) {
      closeModal();
    }
  });
</script>
