<?php

require_once 'Dev.php';
require_once 'config/config.php';
require_once 'Classes/User.php';

$errors = [];

ini_set('display_errors', true);
error_reporting(E_ALL);

if (!isset($_SESSION['PHPSESSID'])) {
    session_start();
}
if ((isset($_COOKIE['username'])) && ($_SESSION['username'] != $_COOKIE['username'])){
    session_destroy();
    setcookie('username', '', time() - 3600);
    header('Location: /');
}


if (isset($_SESSION['username'])) {
    // user interface
    echo 'Hello, ' . $_SESSION['username'];
} elseif (isset($_POST['signup'])) {
    // register
    register($_POST);
} elseif (isset($_POST['signin'])) {
    // login
    login($_POST);
} else {
    switch ($_SERVER['REQUEST_URI']) {
        case '/register':
            require_once 'Pages/register.php';
            break;
        case '/login':
            require_once 'Pages/login.php';
            break;
        default:
            header('Location: /login');
            break;
    }
}

function register($data)
{
    $email = $data['email'];
    $pass = $data['pass'];
    $rePass = $data['re_pass'];
    if ($pass == $rePass) {
        if (strlen($pass) >= 5) {
            $user = new User;
            $user->storeValues($user->getAllByEmail($email));
            if (!isset($user->email)) {
                $user->addUser($data);
            } else {
                $errors[0] = 'This email is already registered';
            }
        } else {
            $errors[0] = 'Password length must be more 4 characters';
        }
    } else {
        $errors[0] = 'Uncorrect repeat password';
    }
    require_once 'Pages/register.php';
}

function login($data)
{
    $email = $data['email'];
    $pass = $data['pass'];
    $user = new User;
    $user->storeValues($user->getAllByEmail($email));
    if (isset($user->id)) {
        if (!$user->blocked) {
            if ($pass == $user->password) {
                if (isset($data['remember-me'])) {
                    setcookie('username', $user->name, time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    setcookie('username', $user->name, time() + (60 * 60));
                }
                $_SESSION['username'] = $user->name;
                header('Location: /');
            } else {
                $errors[0] = 'Incorrect password';
            }
        } else {
            $errors[0] = 'Account blocked';
        }
    } else {
        $errors[0] = 'Email not registered';
    }
    require_once 'Pages/login.php';
}