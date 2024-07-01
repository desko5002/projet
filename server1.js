const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', // Changez cela
    password: '', // Changez cela
    database: 'pro'
});

db.connect(err => {
    if (err) {
        console.error('Erreur de connexion à la base de données:', err);
        return;
    }
    console.log('Connecté à la base de données MySQL');
});

app.use(bodyParser.json());
app.use(express.static('public')); // Pour servir les fichiers statiques (HTML, CSS, JS)

app.get('/search', (req, res) => {
    const query = req.query.query.toLowerCase();
    const sql = `SELECT * FROM evenements WHERE LOWER(nom) LIKE ?`;
    db.query(sql, [`%${query}%`], (err, results) => {
        if (err) {
            return res.status(500).json({ error: err });
        }
        res.json(results);
    });
});

app.listen(port, () => {
    console.log(`Serveur en écoute sur http://localhost:${port}`);
});
