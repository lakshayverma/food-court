<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('config.php');

function calculateDeliveryCharges($amount)
{
    $type = strtolower(getConfigValue('deliveryChargesType'));
    $charges = getConfigValue('deliveryCharges');
    $minOrder = getConfigValue('minOrder');
    $deliveryCharges = 0;

    if ($amount >= $minOrder) {
        return $deliveryCharges;
    }

    switch ($type) {
        case 'percent':
        case 'percentage':
            $deliveryCharges = (($amount * $charges)/ 100);
            break;

        default:
            $deliveryCharges = $charges;
            break;
    }

    return $deliveryCharges;
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

function usersOnly()
{
    if (! isUser()) {
        header("location:index.php");
    }
}

function adminsOnly()
{
    if (! isUser('admin')) {
        header("location:index.php");
    }
}

function getSiteName()
{
    return getConfigValue('siteName', 'Sunny Side Up Bakery');
}


function formatCurrency($amount)
{
    return '₹' . $amount . '/-';
}


function getDeliveryBoy()
{
    return getConfig('deliveryCode');
}
