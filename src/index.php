<?php

$x = 0;
$y = 0;
$z = 0;
$result = null;
$dimension = "";

if (isset($_POST['x'])) {
    $x = (float)$_POST['x'];
}
if (isset($_POST['y'])) {
    $y = (float)$_POST['y'];
}
if (isset($_POST['z'])) {
    $z = (float)$_POST['z'];
}
if (isset($_POST['dimension'])) {
    $dimension = $_POST['dimension'];
}

if ($dimension == 'overworld') {
    $result = overworld_a_nether($x, $y, $z);
} else if ($dimension == 'nether') {
    $result = nether_a_overworld($x, $y, $z);
}

function overworld_a_nether($x, $y, $z)
{
    return [
        $x / 8,
        $y,
        $z / 8
    ];
}

function nether_a_overworld($x, $y, $z)
{
    return [
        $x * 8,
        $y,
        $z * 8
    ];
}

?>

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
            min-height: 100vh;
            margin: 0;
            padding: 1rem;
        }

        .form-container {
            background-color: #3b3b3b;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
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
            box-sizing: border-box;
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
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #6cd645;
        }

        .result {
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: #4a4a4a;
            border-radius: 8px;
            text-align: center;
            font-size: 1.2rem;
            color: #8fff57;
            word-break: break-word;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Conversor Minecraft</h1>
    <form action="" method="POST">
        <label for="dimension">¿Desde qué dimensión quieres convertir las coordenadas?</label>
        <select name="dimension" id="dimension" required>
            <option value="overworld" <?= ($dimension === 'overworld') ? 'selected' : '' ?>>Overworld → Nether</option>
            <option value="nether" <?= ($dimension === 'nether') ? 'selected' : '' ?>>Nether → Overworld</option>
        </select>

        <label for="x">Coordenada X:</label>
        <input type="number" name="x" id="x" step="any" value="<?= htmlspecialchars($x) ?>" required>

        <label for="y">Coordenada Y:</label>
        <input type="number" name="y" id="y" step="any" value="<?= htmlspecialchars($y) ?>" required>

        <label for="z">Coordenada Z:</label>
        <input type="number" name="z" id="z" step="any" value="<?= htmlspecialchars($z) ?>" required>

        <button type="submit">Convertir</button>
    </form>

    <?php if ($result !== null): ?>
        <div class="result">
            <strong>Coordenadas convertidas:</strong><br>
            X: <?= round($result[0], 3) ?><br>
            Y: <?= round($result[1], 3) ?><br>
            Z: <?= round($result[2], 3) ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
