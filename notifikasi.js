document.querySelectorAll('.notif-item').forEach(item => {
    item.addEventListener('click', () => {
        item.classList.remove('unread');
        item.classList.add('read');
    });
});
