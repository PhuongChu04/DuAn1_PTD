<?php
require_once '../connect/connect.php';
class User extends connect{
    public function register($name, $email, $password){
        $hash_password= password_hash($password, PASSWORD_DEFAULT);
        $sql= 'INSERT INTO users(name, email, password, role_id) VALUES(?,?,?,1)';
        $stmt= $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $hash_password]);
    }

    public function login($email, $password){
        $sql= 'SELECT * FROM users WHERE email=?';
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function updateUser($name, $email, $phone, $address){
        $sql = 'UPDATE users SET name=?, email=?, phone=?, address=? WHERE user_id=?';
        $stmt=$this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $_SESSION['user']['user_id']]);
    }

    public function getUserById($id){
        $sql = 'SELECT * FROM users WHERE user_id=?';
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();

    }

    public function updatePassword($newPassword){
        $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql= 'UPDATE users SET password=? WHERE user_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$hash_password, $_SESSION['user']['user_id']]);

    }

    public function getPassword(){ //Lấy mk cũ
        $sql= 'SELECT password FROM users WHERE user_id=?';
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchColumn();
    }

    public function auth($email, $password){
        $sql= 'SELECT * FROM users WHERE email=?';
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $user['role_id'] == 2 && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}