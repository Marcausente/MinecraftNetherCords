<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Coordenadas Minecraft</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #2e2e2e;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #3b3b3b;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #8fff57;
        }

        label {
            display: block;
            margin-top: 1rem;
            margin-bottom: 0.25rem;
        }

        input, select {
            width: 100%;
            padding: 0.5rem;
            border: none;
            border-radius: 6px;
            background-color: #4a4a4a;
            color: #ffffff;
            font-size: 1rem;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.75rem;
            background-color: #57a637;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #6cd645;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Conversor Minecraft</h1>
    <form action="convertir.php" method="POST">
        <label for="dimension">¿Desde qué dimensión quieres convertir las coordenadas?</label>
        <select name="dimension" id="dimension" required>
            <option value="overworld">Overworld → Nether</option>
            <option value="nether">Nether → Overworld</option>
        </select>

        <label for="x">Coordenada X:</label>
        <input type="number" name="x" id="x" step="any" required>

        <label for="y">Coordenada Y:</label>
        <input type="number" name="y" id="y" step="any" required>

        <label for="z">Coordenada Z:</label>
        <input type="number" name="z" id="z" step="any" required>

        <button type="submit">Convertir</button>
    </form>
</div>
</body>
</html>
