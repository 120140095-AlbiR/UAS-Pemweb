// signup.js
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signUpForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);
        fetch('signup.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'login.php';
            } else {
                alert('Error: ' + data.message);
            }
        });
    });
});