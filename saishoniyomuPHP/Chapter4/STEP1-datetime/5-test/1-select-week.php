<form><select name="week">
<?php
$t = time(); // 本日の日付
for ($i = 0; $i < 7; $i++) {
    echo "<option>";
    echo date("Y/m/d", $t);
    echo "</option>";
    $t += (24 * 60 * 60);
}
?>
</select>

