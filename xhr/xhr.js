// xhr.js

document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const rowId = button.getAttribute('data-id');
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Check if the row was deleted successfully
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        const deletedRow = document.getElementById(`row_${rowId}`);
                        if (deletedRow) {
                            deletedRow.remove();
                        }
                    } else {
                        alert('Failed to delete row.');
                    }
                }
            };

            xhr.open('GET', `delete.php?id=${rowId}`, true);
            xhr.send();
        });
    });
});
