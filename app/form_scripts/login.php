<?php

function login(array $fields)
{
    validateLoginFields($fields);
    $user = retriveUser($fields['email']);

    if (!password_verify($fields['password'], $user['password'])){
        loignErrorRedirect();
    }

    addUser($user['id'],$user['is_admin']);

    unset($_SESSION['login']);
    alert('success', "Вы попали куда надо уважаемый ,{$user['name']}");
    redirect();
}

function validateLoginFields (array $fields)
{
    unset($_SESSION['login']);
    $_SESSION['login']['fields'] = $fields;

    if (emptyFields($fields,'login')){
        redirect('/login');
    }
}



function retriveUser(string $email): array
{
    $user = dbSelect(
        Tables::Users ,
        conditions: "email = '{$email}'",
        isSingle: true
    );

        if (!$user) {
            loignErrorRedirect();
        }

        return $user;
}



function loignErrorRedirect()
{
    alert('danger', 'Ошибка в email или пароле , разберись пожалуйста с этим быстренько');
    redirect('/login');
}

