<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CamposAfines
 *
 * @ORM\Table(name="campos_afines")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CamposAfinesRepository")
 */
class CamposAfines
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="UsuarioCamposAfine", mappedBy="CampoAfine")
     */
    private $CamposAfinesUsuarios;

    /**
     * @ORM\OneToMany(targetEntity="Solicitud", mappedBy="CampoAfine")
     */
    private $SolicitudCamposAfines;

    public function __construct()
    {
        $this->SolicitudCamposAfines = new ArrayCollection();
        $this->CamposAfinesUsuarios = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return CamposAfines
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}

