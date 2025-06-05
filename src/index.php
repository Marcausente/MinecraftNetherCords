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
        @import url('https://fonts.googleapis.com/css2?family=Minecraft:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Orbitron', 'Segoe UI', monospace;
            background: linear-gradient(135deg, #1a472a 0%, #2d5a3d 25%, #1a472a 50%, #0f2818 75%, #1a472a 100%);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(124, 252, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(50, 205, 50, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(34, 139, 34, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .form-container {
            background: linear-gradient(145deg, #2a4a3a, #1f3d2f);
            padding: 1.5rem 2rem;
            border-radius: 16px;
            box-shadow: 
                0 0 30px rgba(124, 252, 0, 0.3),
                0 0 60px rgba(50, 205, 50, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 420px;
            max-height: 95vh;
            position: relative;
            border: 2px solid rgba(124, 252, 0, 0.4);
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #7cfc00, #32cd32, #228b22, #7cfc00);
            background-size: 400% 400%;
            animation: borderGlow 3s ease infinite;
            border-radius: 16px;
            z-index: -1;
        }

        @keyframes borderGlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        h1 {
            text-align: center;
            margin-bottom: 1.2rem;
            color: #7cfc00;
            font-size: 1.8rem;
            font-weight: 900;
            text-shadow: 
                0 0 10px #7cfc00,
                0 0 20px #32cd32,
                0 0 30px #228b22;
            letter-spacing: 2px;
            animation: titlePulse 2s ease-in-out infinite alternate;
        }

        @keyframes titlePulse {
            0% { text-shadow: 0 0 10px #7cfc00, 0 0 20px #32cd32, 0 0 30px #228b22; }
            100% { text-shadow: 0 0 15px #7cfc00, 0 0 25px #32cd32, 0 0 35px #228b22; }
        }

        label {
            display: block;
            margin: 0.8rem 0 0.3rem 0;
            color: #b8e6b8;
            font-weight: 700;
            font-size: 1rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        input, select {
            width: 100%;
            padding: 0.7rem;
            border: 2px solid #228b22;
            border-radius: 8px;
            background: linear-gradient(145deg, #1a3d2a, #0f2818);
            color: #ffffff;
            font-size: 1rem;
            font-family: 'Orbitron', monospace;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        input:focus, select:focus {
            outline: none;
            border-color: #7cfc00;
            background: linear-gradient(145deg, #1f4a2f, #143220);
            box-shadow: 
                inset 0 2px 4px rgba(0, 0, 0, 0.3),
                0 0 15px rgba(124, 252, 0, 0.5);
            transform: translateY(-2px);
        }

        input:hover, select:hover {
            border-color: #32cd32;
            transform: translateY(-1px);
        }

        /* Estilos específicos para las opciones del select */
        select option {
            background-color: #1a3d2a;
            color: #ffffff;
            padding: 0.5rem;
            border: none;
        }

        select option:checked,
        select option:hover {
            background-color: #32cd32;
            color: #000000;
        }

        /* Para navegadores Webkit (Chrome, Safari) */
        select::-webkit-scrollbar {
            width: 8px;
        }

        select::-webkit-scrollbar-track {
            background: #0f2818;
        }

        select::-webkit-scrollbar-thumb {
            background: #32cd32;
            border-radius: 4px;
        }

        select::-webkit-scrollbar-thumb:hover {
            background: #7cfc00;
        }

        button {
            margin-top: 1.2rem;
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(145deg, #32cd32, #228b22);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 700;
            font-family: 'Orbitron', monospace;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 
                0 4px 15px rgba(50, 205, 50, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        button:hover::before {
            left: 100%;
        }

        button:hover {
            background: linear-gradient(145deg, #7cfc00, #32cd32);
            transform: translateY(-3px);
            box-shadow: 
                0 6px 20px rgba(124, 252, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        button:active {
            transform: translateY(-1px);
            box-shadow: 
                0 2px 10px rgba(50, 205, 50, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .result {
            margin-top: 1rem;
            padding: 1rem;
            background: linear-gradient(145deg, #1a4a2a, #0f3018);
            border-radius: 12px;
            text-align: center;
            font-size: 1.1rem;
            color: #7cfc00;
            font-weight: 700;
            border: 2px solid #32cd32;
            box-shadow: 
                0 0 20px rgba(124, 252, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            animation: resultFadeIn 0.6s ease-out;
        }

        @keyframes resultFadeIn {
            0% { 
                opacity: 0; 
                transform: translateY(20px) scale(0.9); 
            }
            100% { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        .result strong {
            color: #b8e6b8;
            font-size: 1.1em;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        .coordinate-value {
            display: inline-block;
            color: #7cfc00;
            font-family: 'Orbitron', monospace;
            font-weight: 900;
            text-shadow: 0 0 8px #7cfc00;
            margin: 0 5px;
        }

        /* Efectos adicionales de partículas */
        .form-container::after {
            content: '';
            position: absolute;
            top: 10px;
            right: 10px;
            width: 6px;
            height: 6px;
            background: #7cfc00;
            border-radius: 50%;
            box-shadow: 
                -20px 10px 0 #32cd32,
                -40px -10px 0 #228b22,
                20px -15px 0 #7cfc00,
                40px 5px 0 #32cd32;
            animation: particleFloat 4s ease-in-out infinite;
        }

        @keyframes particleFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(180deg); }
        }

        /* Responsive design mejorado */
        @media (max-width: 480px) {
            .form-container {
                padding: 1rem;
                margin: 0.5rem;
                max-height: 98vh;
            }
            
            h1 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }
            
            input, select, button {
                font-size: 0.9rem;
                padding: 0.6rem;
            }
            
            label {
                font-size: 0.9rem;
                margin: 0.6rem 0 0.2rem 0;
            }
            
            .result {
                font-size: 1rem;
                padding: 0.8rem;
                margin-top: 0.8rem;
            }
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
            <strong>🎯 Coordenadas convertidas:</strong><br>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.5rem;">
                <span style="color: #ff6b6b; font-weight: bold;">X:</span>
                <span class="coordinate-value"><?= round($result[0], 3) ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.3rem;">
                <span style="color: #4ecdc4; font-weight: bold;">Y:</span>
                <span class="coordinate-value"><?= round($result[1], 3) ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.3rem;">
                <span style="color: #45b7d1; font-weight: bold;">Z:</span>
                <span class="coordinate-value"><?= round($result[2], 3) ?></span>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
