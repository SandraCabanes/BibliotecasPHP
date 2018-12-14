<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 13/12/2018
 * Time: 12:13
 */
require_once __DIR__ . '/../database/QueryBuilder.php';


class MunicipioRepository extends QueryBuilder
{

    /**
     * ProvinciaRepository constructor.
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table='municipio', string $classEntity='Municipio')
    {
        parent::__construct($table, $classEntity);
    }
}