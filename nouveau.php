<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 120px;
        }
        button {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Formulaire de Contact</h2>
    <form method="post" action="send_email.php">
        <label for="email">Adresse Email :</label>
        <input type="email" id="email" name="email" placeholder="Votre adresse email" required>

        <label for="nom_complet">Nom Complet :</label>
        <input type="text" id="nom_complet" name="nom_complet" placeholder="Votre nom complet" required>

        <label for="motivations">Motivations :</label>
        <textarea id="motivations" name="motivations" placeholder="Vos motivations pour nous contacter" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>
</body>
</html>
