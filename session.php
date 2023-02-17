<?php 
    try {
        $conn = new PDO('mysql:host=sql.freedb.tech;dbname=freedb_rwwaolqihosting_duanmau',
         'freedb_truongtv26', 'UHdEs6p*zb*7pW*');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        var_dump($conn);
    } catch (PDOException $e) {
            $e->getMessage();
    }
?>