<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SolicitudNotas
 *
 * @ORM\Table(name="solicitud_notas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudNotasRepository")
 */
class SolicitudNotas
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
     * @ORM\Column(name="nota", type="string", length=255)
     */
    private $nota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var Solicitud
     * @ORM\ManyToOne(targetEntity="Solicitud", inversedBy="SolicitudesNotas")
     * @ORM\JoinColumn(name="solicitud", referencedColumnName="id")
     */
    private $solicitud;

    /**
     * @var Estatus
     * @ORM\ManyToOne(targetEntity="Estatus", inversedBy="SolicitudesEstatus")
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
     * Set nota
     *
     * @param string $nota
     *
     * @return SolicitudNotas
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return SolicitudNotas
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

