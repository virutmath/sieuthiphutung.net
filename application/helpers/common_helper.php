<?php
function check_logged() {
    return isset($_SESSION['isLoggedIn']);
}