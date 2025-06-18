    function generateMuleFields() {
        const count = parseInt(document.getElementById('mule_count').value);
        const container = document.getElementById('mule-fields');
        container.innerHTML = '';

        if (count > 10) {
            alert("You can only register up to 10 mules.");
            return;
        }

        for (let i = 0; i < count; i++) {
            container.innerHTML += `
                <h4>Mule ${i + 1}</h4>
                <label>Name:</label>
                <input type="text" name="mules[${i}][name]" required>
                <label>Breed:</label>
                <input type="text" name="mules[${i}][breed]" required>
                <label>Age:</label>
                <input type="number" name="mules[${i}][age]" required>
                <hr>
            `;
        }
    }