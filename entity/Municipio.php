<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 13/12/2018
 * Time: 19:33
 */
require_once 'database/IEntity.php';

class Municipio implements IEntity
{
    /**
     * @var int
     */
    private $id_municipio;
    /**
     * @var int
     */
    private $cod_municipio;
    /**
     * @var int
     */
    private $id_provincia;

    /**
     * Municipio constructor.
     * @param int $cod_municipio
     * @param int $id_provincia
     */
    public function __construct(int $cod_municipio=0, int $id_provincia=0)
    {
        $this->id_municipio = null;
        $this->cod_municipio = $cod_municipio;
        $this->id_provincia = $id_provincia;
    }

    /**
     * @return int
     */
    public function getIdMunicipio(): int
    {
        return $this->id_municipio;
    }

    /**
     * @param int $id_municipio
     * @return Municipio
     */
    public function setIdMunicipio(int $id_municipio): Municipio
    {
        $this->id_municipio = $id_municipio;
        return $this;
    }

    /**
     * @return int
     */
    public function getCodMunicipio(): int
    {
        return $this->cod_municipio;
    }

    /**
     * @param int $cod_municipio
     * @return Municipio
     */
    public function setCodMunicipio(int $cod_municipio): Municipio
    {
        $this->cod_municipio = $cod_municipio;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdProvincia(): int
    {
        return $this->id_provincia;
    }

    /**
     * @param int $id_provincia
     * @return Municipio
     */
    public function setIdProvincia(int $id_provincia): Municipio
    {
        $this->id_provincia = $id_provincia;
        return $this;
    }


    public function toArray(): array
    {
        return[
            'id_municipio'=>$this->id_municipio,
            'cod_municipio'=>$this->cod_municipio,
            'id_provincia'=>$this->id_provincia
        ];
    }
}