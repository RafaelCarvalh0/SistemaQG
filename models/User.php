<?php

class User {
    public $id;
    public $re;
    public $perfil;
    public $name;
    public $department;
    public $journey;
    public $login;
    public $password;
    public $token;
}

interface UserDao {
    public function findByToken($token);
    public function findByLogin($login);
    public function findById($id);
    public function findByProfile($perfil);
    public function update(User $u);
    public function insert(User $u);
}