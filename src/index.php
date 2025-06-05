<?php
// Incluir la lógica del conversor
require_once 'converter.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Coordenadas Minecraft</title>
    <link rel="stylesheet" href="style.css">
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
                <strong>🎯 Coordenadas convertidas:</strong><br>
                <div class="coordinate-row">
                    <span class="coordinate-label x">X:</span>
                    <span class="coordinate-value"><?= round($result[0], 3) ?></span>
                </div>
                <div class="coordinate-row">
                    <span class="coordinate-label y">Y:</span>
                    <span class="coordinate-value"><?= round($result[1], 3) ?></span>
                </div>
                <div class="coordinate-row">
                    <span class="coordinate-label z">Z:</span>
                    <span class="coordinate-value"><?= round($result[2], 3) ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
