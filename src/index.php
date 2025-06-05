<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Coordenadas Minecraft</title>
</head>
<body>
<h1>Conversor de Coordenadas Minecraft</h1>
<form action="convertir.php" method="POST">
    <label for="dimension">¿Desde qué dimensión quieres convertir?</label><br>
    <select name="dimension" id="dimension" required>
        <option value="overworld">Overworld → Nether</option>
        <option value="nether">Nether → Overworld</option>
    </select><br><br>

    <label for="x">Coordenada X:</label><br>
    <input type="number" name="x" id="x" step="any" required><br><br>

    <label for="y">Coordenada Y:</label><br>
    <input type="number" name="y" id="y" step="any" required><br><br>

    <label for="z">Coordenada Z:</label><br>
    <input type="number" name="z" id="z" step="any" required><br><br>

    <button type="submit">Convertir</button>
</form>
</body>
</html>
