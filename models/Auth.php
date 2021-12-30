<?php

require_once 'dao/UserDaoMysql.php';

class Auth
{

    private $pdo;
    private $base;
    private $dao;

    public function __construct(PDO $pdo, $base)
    {
        $this->pdo = $pdo;
        $this->base = $base;
        $this->dao = new UserDaoMysql($this->pdo);
    }

    public function checkToken()
    {
        if (!empty($_SESSION['token'])) {

            $token = $_SESSION['token'];

            $user = $this->dao->findByToken($token);

            if ($user) {
                return $user;
            }
        }

        header("Location: ".$this->base."/login.php");
        exit;
    }
    
    public function validateLogin($login, $password) {

        $user = $this->dao->findByLogin($login);

        if($user) {

            if($password === $user->password) {
                $token = md5(time().rand(0,9999));

                $_SESSION['token'] = $token;
                $user->token = $token;
                $this->dao->update($user);
                return true;
            }

        }

        return false;
    }

    public function validateProfile($login) {

        $profile = $this->dao->findByProfile($login);
        return $profile;
    }
    
}

