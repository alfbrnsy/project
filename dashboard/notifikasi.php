<?php
// Contoh untuk mengambil notifikasi dari database
$notifications = getNotificationsFromDatabase(); // Asumsikan fungsi ini mengambil data dari DB

foreach ($notifications as $notification) {
    echo '<div class="notif-item ' . ($notification['status'] == 'unread' ? 'unread' : 'read') . '">';
    echo '<p><strong>' . $notification['title'] . ':</strong> ' . $notification['message'] . '</p>';
    echo '<span class="notif-date">' . $notification['date'] . '</span>';
    echo '</div>';
}
?>
