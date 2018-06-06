<?php

namespace View;

/**
 * Class UserView
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package View
 */
class UserView
{
    public function login()
    {
?>
        <form action="<?=\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=user.login"?>" method="post">
            <input type="text" name="user[name]" value="">
            <input type="submit" value="Login">
        </form>
<?php
    }

    public function displayName()
    {
?>
Bonjour maudit <?=$_SESSION['name']?><br>
        <a href="<?=\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=user.logout"?>">Logout</a><br>
<?php
    }
}