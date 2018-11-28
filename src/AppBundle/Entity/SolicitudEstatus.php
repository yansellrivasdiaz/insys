<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudEstatus
 *
 * @ORM\Table(name="solicitud_estatus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudEstatusRepository")
 */
class SolicitudEstatus
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var Solicitud
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="solicitudes")
     * @ORM\JoinColumn(name="solicitud", referencedColumnName="id")
     */
    private $solicitud;


    /**
     * @var Estatus
     * @ORM\ManyToOne(targetEntity="Estatus", inversedBy="SolicitudEstatus")
     * @ORM\JoinColumn(name="estatus", referencedColumnName="id")
     */
    private $estatus;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return SolicitudEstatus
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}

