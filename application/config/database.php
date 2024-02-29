<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

//$ServidorBd='172.16.0.73'; #slq
//$ServidorBdSQL='172.16.0.73'; #raya

//conexion para probar en poinke
//$ServidorBd = 'poike.directemar.cl'; 
//conexion ranokaut
//$ServidorBdRano='10.16.119.3'; #ranocaut
$ServidorBdGAMMA='192.168.0.164'; #gamma
$ServidorBdSQL='172.16.0.70'; #sql

$arrayBase= array(
    'dsn'   => '',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

//conexion GAMMA
$db['default'] = array(
    'hostname' => $ServidorBdGAMMA,   
    'username' => 'EvalCompEscritura',
    'password' => 'zUSwUtR7torofRo0Uprl',
    'database' => 'EvaluacionCompetencias',
    'dbdriver' => 'sqlsrv',
);
//permisos
$db['sql'] = array(
    'hostname' => $ServidorBdSQL,   
    'username' => 'guest',
    'password' => '',
    'database' => 'AccesoAp',
    'dbdriver' => 'sqlsrv',
);
//sql tarificado 
$db['Tarificador'] = array(
    'hostname' => $ServidorBdSQL,    
    'username' => 'EvalCompEscritura',
    'password' => 'zUSwUtR7torofRo0Uprl',
    'database' => 'Tarificador',
    'dbdriver' => 'sqlsrv',
);

// $db['default'] = array(
//     'hostname' => $ServidorBdSQL,   
//     'username' => 'EvalCompEscritura',
//     'password' => 'zUSwUtR7torofRo0Uprl',
//     'database' => 'EvaluacionCompetencias',
//     'dbdriver' => 'sqlsrv',
// );

//conexion poinke
// $db['default'] = array(
//     'hostname' => $ServidorBd,   
//     'username' => 'EvalCompEscritura',
//     'password' => 'zUSwUtR7torofRo0Uprl',
//     'database' => 'EvaluacionCompetencias',
//     'dbdriver' => 'sqlsrv',
// );

// $db['Eta'] = array(
//     'hostname' => '172.16.0.73',   
//     'username' => 'EvalCompEscritura',
//     'password' => 'zUSwUtR7torofRo0Uprl',
//     'database' => 'EvaluacionCompetencias',
//     'dbdriver' => 'sqlsrv',
// );
// $db['Ranokau'] = array(
//     'hostname' => $ServidorBdRano,   
//     'username' => 'EvalCompEscritura',
//     'password' => 'zUSwUtR7torofRo0Uprl',
//     'database' => 'EvaluacionCompetencias',
//     'dbdriver' => 'sqlsrv',
// );


// $db['Tarificador'] = array(
//     'hostname' => '172.16.0.70',    
//     'username' => 'TarifaEscritura',
//     'password' => 'zU9eFasTa4rA',
//     'database' => 'Tarificador',
//     'dbdriver' => 'sqlsrv',
// );



$db['default'] =array_merge($arrayBase,$db['default']);
//echo var_dump($db['default']);

