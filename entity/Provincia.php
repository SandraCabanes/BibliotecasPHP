<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 13/12/2018
 * Time: 17:31
 */

require_once 'database/IEntity.php';

class Provincia implements IEntity
{
    /**
     * @var int
     */
    private $id_provincia;
    /**
     * @var int
     */
    private $cod_provincia;
    /**
     * @var string
     */
    private $nom_provincia;

    /**
     * Provincia constructor.
     * @param $cod_provincia
     * @param $nom_provincia
     */
    public function __construct($cod_provincia='', $nom_provincia='')
    {
        $this->id_provincia = null;
        $this->cod_provincia = $cod_provincia;
        $this->nom_provincia = $nom_provincia;
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
     * @return Provincia
     */
    public function setIdProvincia(int $id_provincia): Provincia
    {
        $this->id_provincia = $id_provincia;
        return $this;
    }

    /**
     * @return int
     */
    public function getCodProvincia(): int
    {
        return $this->cod_provincia;
    }

    /**
     * @param int $cod_provincia
     * @return Provincia
     */
    public function setCodProvincia(int $cod_provincia): Provincia
    {
        $this->cod_provincia = $cod_provincia;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomProvincia(): string
    {
        return $this->nom_provincia;
    }

    /**
     * @param string $nom_provincia
     * @return Provincia
     */
    public function setNomProvincia(string $nom_provincia): Provincia
    {
        $this->nom_provincia = $nom_provincia;
        return $this;
    }


    public function toArray(): array
    {
        return[

            'cod_provincia'=>$this->cod_provincia,
            'nom_provincia'=>$this->nom_provincia
        ];
    }
}