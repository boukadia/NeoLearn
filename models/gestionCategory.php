<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group textarea,
        .form-group button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Ajouter une Catégorie</h2>
        <form action="../views/admin/insertCategory.php" method="post">
            <div class="form-group">
                <label for="category">Nom de la catégorie</label>
                <input type="text" id="categoryName" name="categoryName" placeholder="Entrez le nom de la catégorie" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="CategoryDescription" name="CategoryDescription" placeholder="Entrez une description" required></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit">Ajouter</button>
            </div>
        
        </form>
    </div>
</body>

</html>