<?php

class User extends Model 
{
    public function register($username, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $passwordHash);
        $stmt->execute();
        $stmt->close();
    }

    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $passwordHash);
        $stmt->fetch();
        $stmt->close();
        
        if(password_verify($password, $passwordHash)){
            session_start();
            $_SESSION['user_id'] = $id;
            return true;
        } else {
            return false;
        }
    }
}
