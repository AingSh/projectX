<?php

function register(array $fields)
{
    try {
        validateRegisterFields($fields);
        validateEmail($fields['email']);
        $query = "INSERT INTO users (name, surname, birthdate, email, password) VALUES (:name, :surname, :birthdate, :email, :password)";
        $query = DB::connect()->prepare($query);

        $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
        unset($fields['password_confirmation']);

        if ($query->execute($fields)) {
            unset($_SESSION['register']);
            alert('success', 'Вы успешно зарегистрированны!!');
            redirect('/login');
        }
    }  catch (Exception $e) {
        dd($e->getMessage());
    }
}





function validateRegisterFields(array $fields)
{
    unset($_SESSION['register']);
    $_SESSION['register']['fields'] = $fields;

    if (emptyFields($fields, 'register') || !passwordValidation($fields['password'], $fields['password_confirmation'])) {
        redirect('/register');
    }
}

function passwordValidation(string $password , string $passwordConfirmation , string $key = 'register'): bool
{
    $result = true;

    if (strlen($password) < 8) {
        $_SESSION[$key]['errors']['password'] = "Твой пароль слишком короктий";
        $result = false;
    }

    if ($password !== $passwordConfirmation) {
        $_SESSION[$key]['errors']['password'] = "Пароли не совпадают";
        $result = false;
    }

    return $result;
}


function validateEmail(string $email)
{
    $user = dbSelect(
        Tables::Users ,
        conditions: "email = '{$email}'",
        isSingle: true
    );

    if ($user) {
        registerErrorRedirect();
    }

    return $user;
}



function registerErrorRedirect()
{
    alert('danger', 'Email уже занят!');
    redirect('/register');
}