<?php include 'app/views/layouts/header.php'; ?>
<h2 class="text-2xl font-bold mb-4">My Contacts</h2>
<ul class="list-disc pl-6">
<?php foreach ($contacts as $contact): ?>
    <li class="mb-2">
        <?= htmlspecialchars($contact->getFullName()); ?>
        <?php if ($contact->getEmailPersonal()): ?>
            <span class="text-gray-500">(<?= htmlspecialchars($contact->getEmailPersonal()); ?>)</span>
        <?php elseif ($contact->getEmailProfessional()): ?>
            <span class="text-gray-500">(<?= htmlspecialchars($contact->getEmailProfessional()); ?>)</span>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>
<?php include 'app/views/layouts/footer.php'; ?>
