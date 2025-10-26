<?php
$name = "Noon";
$age = 25;
echo "Hello $name! You are $age years old.";

if ($age >= 18) {
  echo "<p>Adult</p>";
} else {
  echo "<p>Minor</p>";
}

for ($i = 1; $i <= 3; $i++) {
  echo "<p>Number $i</p>";
}
?>
