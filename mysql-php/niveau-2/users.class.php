<?php
include("dbh.class.php");
class Users extends Dbh
{
    public function getUsers()
    {
        $sql = "SELECT * FROM utilisateurs";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function deleteUserById($userId)
    {
        $sql = "DELETE FROM utilisateurs WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userId]);
    }
}
