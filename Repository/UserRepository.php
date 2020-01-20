<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id'],
            $user['role'],
            $user['address'],
            $user['city'],
            $user['zipcode']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['id'],
                $user['role'],
                $user['address'],
                $user['city'],
                $user['zipcode']
            );
        }

        return $result;
    }
    public function newUser(user $user)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `role`, `address`, `city`, `zipcode`) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?) 
        ');
        $data = array($user->getEmail(),$user->getPassword(),$user->getName(),$user->getSurname(),0,$user->getAddress(),$user->getCity(),$user->getZipcode());
        $stmt->execute($data);
    }
    public function updateAccountDetails(user $user, string $oldEmail)
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE `users` SET `email` = ?,`name` = ?, `surname`= ?,`address` = ?, `city` = ?, `zipcode` = ? 
        WHERE `email` = ?');
        $data = array($user->getEmail(),$user->getName(),$user->getSurname(),$user->getAddress(),$user->getCity(),$user->getZipcode(), $oldEmail);
        $stmt->execute($data);
    }
    public function changePassword(string $newPassword, $email)
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE `users` SET `password` = ?
        WHERE `email` = ? 
        ');
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->execute([$newPassword, $email]);
    }
    public function removeUser($userId)
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM `users` 
        WHERE `id` = ? 
        ');
        $stmt->execute([$userId]);
    }
}