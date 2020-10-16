<?php

class TblUsers extends Dbh
{
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function verifyAccess($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        $access = password_verify($password, $result["password"]);
        return $access;
    }

    public function insertUser($user)
    {
        $sql = "INSERT INTO users (lname, fname, email, password, status) 
        VALUES (:lname, :fname, :email, :password, :status)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":lname", $user["lname"]);
        $stmt->bindValue(":fname", $user["fname"]);
        $stmt->bindValue(":email", $user["email"]);
        $stmt->bindValue(":password", $user["password"]);
        $stmt->bindValue(":status", $user["status"]);
        $stmt->execute();
    }

    public function deleteUserById($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function updateUserAtId($user, $id)
    {
        $sql = "UPDATE users 
        SET lname = :lname, fname = :fname, email = :email, password = :password, status = :status
        WHERE id = :id";
        if (empty($user["password"])) {
            $sql = "UPDATE users 
            SET lname = :lname, fname = :fname, email = :email, status = :status
            WHERE id = :id";
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":lname", $user["lname"]);
        $stmt->bindValue(":fname", $user["fname"]);
        $stmt->bindValue(":email", $user["email"]);
        if (!empty($user["password"])) {
            $stmt->bindValue(":password", $user["password"]);
        }
        $stmt->bindValue(":status", $user["status"]);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}
