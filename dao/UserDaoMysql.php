<?php

require_once 'models/User.php';


class UserDaoMysql implements UserDAO
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function generateUser($array)
    {

        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->re = $array['re'] ?? 0;
        $u->perfil = $array['perfil'] ?? '';
        $u->name = $array['name'] ?? '';
        $u->department = $array['department'] ?? '';
        $u->journey = $array['journey'] ?? '';
        $u->login = $array['login'] ?? '';
        $u->password = $array['password'] ?? '';
        $u->confirmado = $array['confirmado'] ?? 0;
        $u->token = $array['token'] ?? '';

        return $u;
    }

    public function findByToken($token)
    {
        if (!empty($token)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function findByLogin($login)
    {
        if (!empty($login)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
            $sql->bindValue(':login', $login);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function findById($id)
    {
        if (!empty($id)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function findByProfile($login)
    {

        if (!empty($login)) {
            $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
            $sql->bindValue(':login', $login);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                foreach ($data as $p) {
                    if ($p == 'admin' or $p == 'comum') {
                        return $p;
                    }
                }
            }
        }

        return false;
    }

    public function update(User $u)
    {

        $sql = $this->pdo->prepare("UPDATE usuarios SET
            re = :re,
            perfil = :perfil,
            name = :name,
            department = :department,
            journey = :journey,
            login = :login,
            password = :password,
            confirmado = :confirmado,
            token = :token
            WHERE id = :id");

        $sql->bindValue(':re', $u->re);
        $sql->bindValue(':perfil', $u->perfil);
        $sql->bindValue(':name', $u->name);
        $sql->bindValue(':department', $u->department);
        $sql->bindValue(':journey', $u->journey);
        $sql->bindValue(':login', $u->login);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':confirmado', $u->confirmado);
        $sql->bindValue(':token', $u->token);
        $sql->bindValue(':id', $u->id);
        $sql->execute();

        return true;
    }

    public function insert(User $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (
            login, password, token
            ) VALUES(
                :login, :password, :token
            )");

        $sql->bindValue(':login', $u->login);
        $sql->bindValue(':password', $u->password);
        $sql->bindValue(':token', $u->token);
        $sql->execute();

        return true;
    }
}
