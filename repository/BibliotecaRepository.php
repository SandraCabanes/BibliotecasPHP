<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 13/12/2018
 * Time: 12:13
 */
require_once __DIR__ . '/../database/QueryBuilder.php';


class BibliotecaRepository extends QueryBuilder
{

    /**
     * ProvinciaRepository constructor.
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table='biblioteca', string $classEntity='Biblioteca')
    {
        parent::__construct($table, $classEntity);
    }
}