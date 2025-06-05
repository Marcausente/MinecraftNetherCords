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
    $result = nether_a_overword($x, $y, $z);
}

function overworld_a_nether($x, $y, $z)
{
    $x = $x / 8;
    $result[0] = $x;
    $result[1] = $y;
    $z = $z / 8;
    $result[2] = $z;
    return $result;
}

function nether_a_overword($x, $y, $z)
{
    $x = $x * 8;
    $result[0] = $x;
    $result[1] = $y;
    $z = $z * 8;
    $result[2] = $z;
    return $result;
}

?> 