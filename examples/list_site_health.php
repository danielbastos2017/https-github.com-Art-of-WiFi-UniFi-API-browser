<?php
/**
 * PHP API usage example
 *
 * contributed by: slooffmaster
 * description: example to pull site health metrics from the Unifi controller and output the results
 *              in json format
 */

/**
 * include the config file (place you credentials etc. there if not already present)
 */
include('../config.php');

/**
 * the short name of the site you wish to query
 */
$site_id = '<enter your site id here>';

/**
 * load the Unifi API connection class and log in to the controller and pull the requested data
 */
require('../phpapi/class.unifi.php');

$unifidata    = new unifiapi($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion);
$loginresults = $unifidata->login();
$result       = $unifidata->list_health();

/**
 * output the results in correct json formatting
 */
header('Content-Type: application/json');
echo (json_encode($result, JSON_PRETTY_PRINT));