<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitud
 *
 * @ORM\Table(name="solicitud")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SolicitudRepository")
 */
class Solicitud
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
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var Usuario
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="UsuarioAsignadoSolicitudes")
     * @ORM\JoinColumn(name="usuario_asignado", referencedColumnName="id")
     */
    private $usuarioAsignado;

    /**
     * @var Usuario
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="UsuarioSolicitanteSolicitudes")
     * @ORM\JoinColumn(name="usuario_solicitante", referencedColumnName="id")
     */
    private $usuarioSolicitante;

    /**
     * @var CamposAfines
     * @ORM\ManyToOne(targetEntity="CamposAfines", inversedBy="SolicitudCamposAfines")
     * @ORM\JoinColumn(name="campo_afine", referencedColumnName="id")
     */
    private $CampoAfine;


    /**
     * @var Estatus
     * @ORM\ManyToOne(targetEntity="Estatus", inversedBy="solicitudes")
     * @ORM\JoinColumn(name="estatus", referencedColumnName="id")
     */
    private $estatus;

    /**
     * @ORM\OneToMany(targetEntity="SolicitudNotas", mappedBy="solicitud")
     */
    private $SolicitudesNotas;

    /**
     * @ORM\OneToMany(targetEntity="SolicitudEstatus", mappedBy="solicitud")
     */
    private $EstatusSolicitudes;

    public function __construct()
    {
        $this->SolicitudesNotas = new ArrayCollection();
        $this->EstatusSolicitudes = new ArrayCollection();
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
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Solicitud
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

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Solicitud
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Solicitud
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

