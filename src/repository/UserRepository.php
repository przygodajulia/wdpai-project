<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // TODO > this probably fetches just one row
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['userid'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['location']
        );
    }

    public function getUserById(int $userid)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE userid = :userid
        ');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt->execute();

        // TODO > this probably fetches just one row
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['userid'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['location']
        );
    }

    public function checkEmailExists(string $email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return false;
        }
        return true;

    }



    public function addUser(User $user)
    {

        // TODO > check if the user already exists?
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, name, surname, location)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getLocation()
        ]);
    }


}