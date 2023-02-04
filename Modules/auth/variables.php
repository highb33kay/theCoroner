<?php
if (isset($_POST['time']) && isset($_POST['url'])) {
    $set_time = $_POST['time'];
    $url = $_POST['url'];
} else {
    $set_time = 60;
    $url =
        'https://docs.google.com/forms/d/e/1FAIpQLScS9P4m_dCRm6wBeeV1OwN7HHZKVx7tUNN-pCtfIjfwyFADkg/viewform?embedded=true';
}
?>
