<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('config.php');

function calculateDeliveryCharges($amount)
{
    $type = strtolower(getConfigValue('deliveryChargesType'));
    $charges = getConfigValue('deliveryCharges');
    $totalAmount = 0;

    switch ($type) {
        case 'percent':
        case 'percentage':
            $totalAmount = $amount + (($amount * $charges)/ 100);
            break;

        default:
            $totalAmount = $amount + $charges;
            break;
    }

    return $totalAmount;
}

function getSessionValue($key, $default = null)
{
    $value = $default;

    if (isset($_SESSION[$key])) {
        $value = ($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    return $value;
}


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

function adminsOnly()
{
    if (! isUser('admin')) {
        header("location:index.php");
    }
}
