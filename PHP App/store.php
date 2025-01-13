<?php
//入力データの振り分けを行うファイル


require_once('functions.php');

savePostedData($_POST);
header('Location: ./index.php');