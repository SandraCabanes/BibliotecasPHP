<?php
/**
 * Created by PhpStorm.
 * User: Sandra
 * Date: 13/12/2018
 * Time: 19:42
 */

require_once 'database/IEntity.php';

class Biblioteca implements IEntity
{
    /**
     * @var int
     */
    private $id_biblioteca;
    /**
     * @var string
     */
    private $tipo;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $direccion;
    /**
     * @var string
     */
    private $cod_postal;
    /**
     * @var string
     */
    private $telefono;
    /**
     * @var string
     */
    private $web;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $catalogo;
    /**
     * @var int
     */
    private $id_municipio;

    /**
     * Biblioteca constructor.
     * @param string $tipo
     * @param string $nombre
     * @param string $direccion
     * @param string $cod_postal
     * @param string $telefono
     * @param string $web
     * @param string $email
     * @param string $catalogo
     * @param int $id_municipio
     */
    public function __construct(string $tipo='', string $nombre='', string $direccion='', string $cod_postal='', string $telefono='', string $web='', string $email='', string $catalogo='', int $id_municipio=0)
    {
        $this->id_biblioteca = null;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->cod_postal = $cod_postal;
        $this->telefono = $telefono;
        $this->web = $web;
        $this->email = $email;
        $this->catalogo = $catalogo;
        $this->id_municipio = $id_municipio;
    }

    /**
     * @return int
     */
    public function getIdBiblioteca(): int
    {
        return $this->id_biblioteca;
    }

    /**
     * @param int $id_biblioteca
     * @return Biblioteca
     */
    public function setIdBiblioteca(int $id_biblioteca): Biblioteca
    {
        $this->id_biblioteca = $id_biblioteca;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return Biblioteca
     */
    public function setTipo(string $tipo): Biblioteca
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Biblioteca
     */
    public function setNombre(string $nombre): Biblioteca
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDireccion(): string
    {
        return $this->direccion;
    }

    /**
     * @param string $direccion
     * @return Biblioteca
     */
    public function setDireccion(string $direccion): Biblioteca
    {
        $this->direccion = $direccion;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodPostal(): string
    {
        return $this->cod_postal;
    }

    /**
     * @param string $cod_postal
     * @return Biblioteca
     */
    public function setCodPostal(string $cod_postal): Biblioteca
    {
        $this->cod_postal = $cod_postal;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * @param string $telefono
     * @return Biblioteca
     */
    public function setTelefono(string $telefono): Biblioteca
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeb(): string
    {
        return $this->web;
    }

    /**
     * @param string $web
     * @return Biblioteca
     */
    public function setWeb(string $web): Biblioteca
    {
        $this->web = $web;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Biblioteca
     */
    public function setEmail(string $email): Biblioteca
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCatalogo(): string
    {
        return $this->catalogo;
    }

    /**
     * @param string $catalogo
     * @return Biblioteca
     */
    public function setCatalogo(string $catalogo): Biblioteca
    {
        $this->catalogo = $catalogo;
        return $this;
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
     * @return Biblioteca
     */
    public function setIdMunicipio(int $id_municipio): Biblioteca
    {
        $this->id_municipio = $id_municipio;
        return $this;
    }


    public function toArray(): array
    {
        return[
            'id_biblioteca'=>$this->id_biblioteca,
            'tipo'=>$this->tipo,
            'nombre'=>$this->nombre,
            'direccion'=>$this->direccion,
            'cod_postal'=>$this->cod_postal,
            'telefono'=>$this->telefono,
            'web'=>$this->web,
            'email'=>$this->email,
            'catalogo'=>$this->catalogo,
            'id_municipio'=>$this->id_municipio
        ];
    }
}