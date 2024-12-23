// book.js
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bookForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        if (validateForm()) {
            const formData = new FormData(form);
            fetch('process_book.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    addToTable(data.book);
                } else {
                    alert('Error: ' + data.message);
                }
            });
        }
    });

    function validateForm() {
        // Add your validation logic here
        return true;
    }

    function addToTable(book) {
        const table = document.getElementById('bookTable').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();
        newRow.insertCell(0).textContent = book.title;
        newRow.insertCell(1).textContent = book.author;
        newRow.insertCell(2).textContent = book.genre;
        newRow.insertCell(3).textContent = book.published;
        newRow.insertCell(4).textContent = book.available ? 'Yes' : 'No';
    }
});

function setLocalStorage(key, value) {
    localStorage.setItem(key, value);
}

function getLocalStorage(key) {
    return localStorage.getItem(key);
}

function deleteLocalStorage(key) {
    localStorage.removeItem(key);
}