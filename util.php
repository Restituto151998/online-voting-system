<?php

function getStatusColor($status)
{
    if ($status == 'pending') {
        return 'warning';
    }
    if ($status == 'published') {
        return 'primary';
    }
    if ($status == 'draft') {
        return 'danger';
    }
}

function redirect($path)
{
    echo "<script> window.location.replace('./$path.php')</script>";
}

function clearError()
{
    unset($_SESSION['hasError']);
}

function selected($a, $b)
{
    if ($a == $b) {
        echo 'selected';
    }
}

function canView($for, $role)
{
    if (can($for, $role)) {
        return redirect('forbidden');
    }

    return true;
}

function can($for, $role)
{
    return (is_string($for) && $for != $role) ||
        (is_array($for) && !in_array($role, $for));
}



class Auth
{

    static function check()
    {
        if (!isset($_SESSION['user'])) {
            redirect('index');
        }
    }

    static function setUser($user)
    {
        $_SESSION['user'] = $user;
    }

    static function logout()
    {
        unset($_SESSION['user']);
    }

    static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    static function getRole()
    {
        return static::user()->type;
    }
}
