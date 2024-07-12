// Function to toggle dark mode
function toggleDarkMode() {
    const body = document.body;
    const stylesheet = document.getElementById('stylesheet');    

    // Toggle dark mode class on body
    body.classList.toggle('dark-mode');

    // Toggle dark mode in localStorage
    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('darkModeEnabled', 'true');
    } else {
        localStorage.setItem('darkModeEnabled', 'false');
    }
}

// Check localStorage on page load to set initial dark mode state
document.addEventListener('DOMContentLoaded', function() {
    const darkModeEnabled = localStorage.getItem('darkModeEnabled');

    if (darkModeEnabled && darkModeEnabled === 'true') {
        document.body.classList.add('dark-mode');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Get the checkbox element
    const checkbox = document.getElementById('darkModeToggle');

    // Check localStorage for saved state
    const checked = localStorage.getItem('checkboxChecked') === 'true';

    // Set initial checkbox state based on localStorage
    checkbox.checked = checked;

    // Add event listener for checkbox change
    checkbox.addEventListener('change', function() {
        // Update localStorage with the new checkbox state
        localStorage.setItem('checkboxChecked', checkbox.checked);
    });
});
