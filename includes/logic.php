<?php
session_start();

function isUser($userType = null)
{
    if (isset($_SESSION["name"]) && isset($_SESSION["email"]) && isset($_SESSION["utype"])) {

        if ($userType) {
            return ($userType == $_SESSION['utype']);
        } else {
            return true;
        }

    } else {
        return false;
    }
}


function guestsOnly($userType = null)
{
    if (isUser($userType)) {
        header("location:index.php");
    } else {
        // continue
    }
}
