<?php

class User
{
    private $pdo = null;

    public $id = null;
    public $login = null;
    public $name = null;
    public $email = null;
    public $password = null;
    public $blocked = null;

    public function __construct()
    {
        $this->pdo = new PDO(DSN, DB_USER, DB_PASS, DB_OPT);
    }

    /**
     * Возвращает всю информацию о пользователе
     * @param $id, ID пользователя
     * @return array Массив информации о пользователе
     */
    public function getAllById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getLoginById($id)
    {
        $stmt = $this->pdo->prepare('SELECT login FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Возвращет всю информацию о всех пользователях
     * @return array Возвращает массив, состоящий из массивов информации о пользователях
     */
    public function getAllUsers()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

    public function getAllLogins()
    {
        $stmt = $this->pdo->query('SELECT login FROM users');
        return $stmt->fetchAll();
    }

    public function storeValues($data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }
        if (isset($data['login'])) {
            $this->login = $data['login'];
        }
        if (isset($data['password'])) {
            $this->password = $data['password'];
        }
        if (isset($data['blocked'])) {
            $this->blocked = $data['blocked'];
        }
        if (isset($data['email'])) {
            $this->email = $data['email'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
    }

    public function getAllByLogin($login)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE login = ?');
        $stmt->execute([$login]);
        return $stmt->fetch();
    }

    public function getAllByEmail($email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function addUser($data) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':password', $data['pass']);
        $stmt->execute();
    }
}