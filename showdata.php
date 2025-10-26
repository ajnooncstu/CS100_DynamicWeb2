<?php
echo "<h2>Received Form Data</h2>";

if (!empty($_REQUEST)) {
    echo "<ul>";
    foreach ($_REQUEST as $key => $value) {
        echo "<li><b>" . htmlspecialchars($key) . 
             ":</b> " . htmlspecialchars($value) 
             . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No form data received.</p>";
}
?>
