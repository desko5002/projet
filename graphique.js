// Récupérer les données de la base de données via le fichier PHP
fetch('getEvenementsData.php')
    .then(response => response.json())
    .then(data => {
        // Traiter les données pour les utiliser avec Chart.js
        const labels = [];
        const dataSet = [];

        data.forEach(item => {
            labels.push(`${item.annee}-${item.mois}`);
            dataSet.push(item.nombre_evenements);
        });

        // Créer le graphique avec Chart.js
        const ctx = document.getElementById('graphiqueEvenements').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',  // Type de graphique (bar pour un diagramme à barres)
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre d\'événements',
                    data: dataSet,
                    backgroundColor: 'rgba(255, 165, 0, 0.2)', // Couleur de fond orange transparent
                    borderColor: 'rgba(255, 165, 0, 1)', // Couleur de la bordure orange opaque
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true  // Axe Y commence à zéro
                    }
                }
            }
        });
    })
    .catch(error => console.error('Erreur lors de la récupération des données:', error));
