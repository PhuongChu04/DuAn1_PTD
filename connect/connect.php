<?php

    //kết nối cơ sở dữ liệu
    class connect{
        public function connect(){
            $serverName = 'localhost';
            $userName = 'root';
            $password = '';
            $myDB = 'duan1_ptd';
            try {
                $conn = new PDO("mysql:host=$serverName;dbname=$myDB", $userName, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (\Throwable $th) {
                echo 'Kết nối thất bại'. $th->getMessage();
                return null;
            }
        }
    }

?>