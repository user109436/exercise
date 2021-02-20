<?php
require('./phpqrcode/qrlib.php');
require('./private/db.php');

session_start();
echo $_SESSION['name'];
echo $name;
