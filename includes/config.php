<?php

function configs()
{
    return [
        'minOrder' => 300,
        'deliveryCharges' => 50,
        'deliveryChargesType' => 'flat',
        'deliveryCode' => 'Delivery Boy',
    ];
}

function getConfigValue($key, $default = 0)
{
    $configs = configs();
    $val = $default;

    if (array_key_exists($key, $configs) && $configs[$key]) {
        $val = $configs[$key];
    }

    return $val;
}
