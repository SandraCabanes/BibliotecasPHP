<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 11/12/2018
 * Time: 8:51
 */

return[
    'database'=>[
        'name'=>'directoriobibliotecas',
        'username'=>'root',
        'password'=>'',
        'connection'=>'mysql:host=localhost',
        'options'=>[
            PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT=>true
        ]
    ]
];