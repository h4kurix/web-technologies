<?php
$colours_keys = explode(" ", "каждый охотник желает знать где сидит фазан");
$colours_values = ["красный", "оранжевый", "желтый", "зеленый", "голубой", "синий", "фиолетовый"];

$colours = array_combine($colours_keys, $colours_values);
asort($colours);

echo "<table border='1'><tr>";
foreach ($colours as $key => $color) {
    echo "<td>$key: $color</td>";
}
echo "</tr></table>\n";
?>