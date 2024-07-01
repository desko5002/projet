const express = require('express');
const mysql = require('mysql');
const path = require('path'); // Importez le module path
const app = express();
const port = 3000;

// Configurer la connexion à la base de données
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '', // Remplacez par votre mot de passe MySQL
    database: 'pro' // Remplacez par le nom de votre base de données
});

db.connect(err => {
    if (err) throw err;
    console.log('Connected to database');
});

// Servir les fichiers statiques
app.use(express.static(__dirname));

// Route pour récupérer les 3 derniers événements
app.get('/events', (req, res) => {
    const query = 'SELECT photo FROM evenements ORDER BY datecreation DESC LIMIT 3';
    db.query(query, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

app.listen(port, () => {
    console.log(`Server running on port ${port}`);
});
