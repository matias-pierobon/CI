<?php

namespace MPM\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumnos")
 * @ORM\Entity(repositoryClass="MPM\EntityBundle\Entity\AlumnoRepository")
 */
class Alumno extends Persona
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text")
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="grupoSanguineo", type="string", length=255)
     */
    private $grupoSanguineo;

    /**
     * @var string
     *
     * @ORM\Column(name="factorSanguineo", type="string", length=255)
     */
    private $factorSanguineo;

    /**
     * @var string
     *
     * @ORM\Column(name="emergencias", type="text")
     */
    private $emergencias;

    /**
     * @ORM\OneToMany(targetEntity="ObraSocial", mappedBy="alumnos", cascade={"persist", "merge"})
     */
    private $obraSocial;

    /**
     * @ORM\OneToMany(targetEntity="TutorRelation", mappedBy="alumno")
     **/
    private $tutores;

    /**
     * @ORM\ManyToOne(targetEntity="Curso", inversedBy="alumnos")
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     */
    private $curso;

    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="alumno")
     */
    private $pagos;

    /**
     * @ORM\OneToMany(targetEntity="Ausente", mappedBy="clase")
     */
    private $ausentes;

    /**
     * @ORM\OneToMany(targetEntity="Nota", mappedBy="alumno")
     */
    private $notas;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->obraSocial = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tutores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ausentes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Alumno
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Alumno
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set grupoSanguineo
     *
     * @param string $grupoSanguineo
     * @return Alumno
     */
    public function setGrupoSanguineo($grupoSanguineo)
    {
        $this->grupoSanguineo = $grupoSanguineo;

        return $this;
    }

    /**
     * Get grupoSanguineo
     *
     * @return string 
     */
    public function getGrupoSanguineo()
    {
        return $this->grupoSanguineo;
    }

    /**
     * Set factorSanguineo
     *
     * @param string $factorSanguineo
     * @return Alumno
     */
    public function setFactorSanguineo($factorSanguineo)
    {
        $this->factorSanguineo = $factorSanguineo;

        return $this;
    }

    /**
     * Get factorSanguineo
     *
     * @return string 
     */
    public function getFactorSanguineo()
    {
        return $this->factorSanguineo;
    }

    /**
     * Set emergencias
     *
     * @param string $emergencias
     * @return Alumno
     */
    public function setEmergencias($emergencias)
    {
        $this->emergencias = $emergencias;

        return $this;
    }

    /**
     * Get emergencias
     *
     * @return string 
     */
    public function getEmergencias()
    {
        return $this->emergencias;
    }

    /**
     * Add obraSocial
     *
     * @param \MPM\EntityBundle\Entity\ObraSocial $obraSocial
     * @return Alumno
     */
    public function addObraSocial(\MPM\EntityBundle\Entity\ObraSocial $obraSocial)
    {
        $this->obraSocial[] = $obraSocial;

        return $this;
    }

    /**
     * Remove obraSocial
     *
     * @param \MPM\EntityBundle\Entity\ObraSocial $obraSocial
     */
    public function removeObraSocial(\MPM\EntityBundle\Entity\ObraSocial $obraSocial)
    {
        $this->obraSocial->removeElement($obraSocial);
    }

    /**
     * Get obraSocial
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObraSocial()
    {
        return $this->obraSocial;
    }

    /**
     * Add tutores
     *
     * @param \MPM\EntityBundle\Entity\TutorRelation $tutores
     * @return Alumno
     */
    public function addTutore(\MPM\EntityBundle\Entity\TutorRelation $tutores)
    {
        $this->tutores[] = $tutores;

        return $this;
    }

    /**
     * Remove tutores
     *
     * @param \MPM\EntityBundle\Entity\TutorRelation $tutores
     */
    public function removeTutore(\MPM\EntityBundle\Entity\TutorRelation $tutores)
    {
        $this->tutores->removeElement($tutores);
    }

    /**
     * Get tutores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTutores()
    {
        return $this->tutores;
    }

    /**
     * Set curso
     *
     * @param \MPM\EntityBundle\Entity\Curso $curso
     * @return Alumno
     */
    public function setCurso(\MPM\EntityBundle\Entity\Curso $curso = null)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return \MPM\EntityBundle\Entity\Curso 
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Add pagos
     *
     * @param \MPM\EntityBundle\Entity\Pago $pagos
     * @return Alumno
     */
    public function addPago(\MPM\EntityBundle\Entity\Pago $pagos)
    {
        $this->pagos[] = $pagos;

        return $this;
    }

    /**
     * Remove pagos
     *
     * @param \MPM\EntityBundle\Entity\Pago $pagos
     */
    public function removePago(\MPM\EntityBundle\Entity\Pago $pagos)
    {
        $this->pagos->removeElement($pagos);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagos()
    {
        return $this->pagos;
    }

    /**
     * Add ausentes
     *
     * @param \MPM\EntityBundle\Entity\Ausente $ausentes
     * @return Alumno
     */
    public function addAusente(\MPM\EntityBundle\Entity\Ausente $ausentes)
    {
        $this->ausentes[] = $ausentes;

        return $this;
    }

    /**
     * Remove ausentes
     *
     * @param \MPM\EntityBundle\Entity\Ausente $ausentes
     */
    public function removeAusente(\MPM\EntityBundle\Entity\Ausente $ausentes)
    {
        $this->ausentes->removeElement($ausentes);
    }

    /**
     * Get ausentes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAusentes()
    {
        return $this->ausentes;
    }

    /**
     * Add notas
     *
     * @param \MPM\EntityBundle\Entity\Nota $notas
     * @return Alumno
     */
    public function addNota(\MPM\EntityBundle\Entity\Nota $notas)
    {
        $this->notas[] = $notas;

        return $this;
    }

    /**
     * Remove notas
     *
     * @param \MPM\EntityBundle\Entity\Nota $notas
     */
    public function removeNota(\MPM\EntityBundle\Entity\Nota $notas)
    {
        $this->notas->removeElement($notas);
    }

    /**
     * Get notas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotas()
    {
        return $this->notas;
    }
}
