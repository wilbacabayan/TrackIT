function updateDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    const time = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
    document.getElementById('dateAndTime').textContent = `${date} ${time}`;
}

// Initial call to display the date and time immediately
updateDateTime();

// Update the date and time every second
setInterval(updateDateTime, 1000);