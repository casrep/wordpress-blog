<?php
$services=parse_url(getenv("CLEARDB_DATABASE_URL"));
echo "<pre>";
print_r ($services);
echo "</pre>";
?>