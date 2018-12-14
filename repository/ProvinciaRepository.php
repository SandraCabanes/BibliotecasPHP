<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 13/12/2018
 * Time: 12:13
 */
require_once __DIR__ . '/../database/QueryBuilder.php';


class ProvinciaRepository extends QueryBuilder
{

    /**
     * ProvinciaRepository constructor.
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table='provincia', string $classEntity='Provincia')
    {
        parent::__construct($table, $classEntity);
    }
}