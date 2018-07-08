<?php

require('main_page.php');

// Установка соединения
$mysqli = new mysqli('localhost', 'root', '', 'db_authorization');
if (!$mysqli) die ("Невозможно подключение к MySQL");
$mysqli->query("SET CHARACTER SET 'UTF8'");
$mysqli->query("SET CHARSET 'UTF8'");
$mysqli->query("SET NAMES 'UTF8'");

if (isset($_POST['GO'])) {
    $log = $_POST['log'];
    $pass = $_POST['pass'];
    $coded_pass = sha1($pass);
    if (($log != '') && ($pass != '')) {
        if ($pass == $_POST['pass2']) { // если пароли совпадают  

            $result = $mysqli->query('SELECT * FROM users WHERE login="'.$log.'" AND password="'.$coded_pass.'"');
            $user = $result->fetch_assoc(); 

            if (empty($user)) { // если пользователь не зарегистрирован
                $new_record = $mysqli->query("INSERT INTO users (login, password) VALUES('$log','$coded_pass')");
                if ($new_record) {
                    echo "<script>alert('".$log." добавлен в базу данных.');</script>";
                    $mysqli->close();
                    echo "<script>window.location.href='tennis.html';</script>";
                }
                else echo "<script>alert('Такого пользователя нет. Пользователь не может быть добавлен.');</script>";
            } else {  // если пользователь зарегистрирован
                $_pass = $_POST['_pass'];
                $_pass2 = $_POST['_pass2'];
                if (($_pass != '') && ($_pass2 != '')) {
                    if ($_pass == $_pass2) {
                        //изменение пароля
                        $_coded_pass = sha1($_pass);
                        $new_pass = $mysqli->query("UPDATE `users` SET `password` = '$_coded_pass' WHERE `login`='$log' AND `password`='$coded_pass' LIMIT 1");
                        echo "<script>alert('Здравствуйте, ".$log.". Пароль изменён успешно.');</script>";
                    } else {   
                        echo "<script>alert('Новый пароль и его подтверждение не совпадают!');</script>"; 
                    }
                } else {
                    echo "<script>alert('Здравствуйте, ".$log."');</script>";
                }
                $mysqli->close();
                echo "<script>window.location.href='tennis.html';</script>"; 
            }
        }
        $result->free();       
    } else {  
        echo "<script>alert('Пароль  его подтверждение не совпадают!');</script>";
    }
}
?>
