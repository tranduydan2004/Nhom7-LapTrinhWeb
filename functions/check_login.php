<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "Logged in";
} else {
    echo "Not logged in";
}
?>