function searchEvents() {
    const query = document.getElementById('search-bar').value;

    fetch(`actualité.php?query=${query}`)
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';
            data.forEach(event => {
                const eventDiv = document.createElement('div');
                eventDiv.className = 'event';
                eventDiv.textContent = event.nom; // Assurez-vous que le champ correspond au nom dans votre table
                resultsDiv.appendChild(eventDiv);
            });
        });
}
