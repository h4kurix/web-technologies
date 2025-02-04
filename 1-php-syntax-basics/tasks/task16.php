<?php
function f_color($num = 5)
{
    if ($num % 2 == 0) {
        echo "<span style='color:green'>Четное число</span>\n";
    } else {
        echo "<span style='color:red'>Нечетное число</span>\n";
    }
}

echo "Even number call: ";
f_color(4);
echo "Odd number call: ";
f_color(7);
echo "Default call: ";
f_color();
?>