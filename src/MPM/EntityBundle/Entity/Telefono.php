<?php

namespace MPM\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefono
 *
 * @ORM\Table(name="telefonos")
 * @ORM\Entity(repositoryClass="MPM\EntityBundle\Entity\TelefonoRepository")
 */
class Telefono
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=255)
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="integer")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @ORM\ManyToMany(targetEntity="Persona", mappedBy="telefonos")
     **/
    private $personas;

    /**
     * @ORM\ManyToMany(targetEntity="Domicilio", mappedBy="telefonos")
     **/
    private $domicilios;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->domicilios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return Telefono
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Telefono
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Telefono
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add personas
     *
     * @param \MPM\EntityBundle\Entity\Persona $personas
     * @return Telefono
     */
    public function addPersona(\MPM\EntityBundle\Entity\Persona $personas)
    {
        $this->personas[] = $personas;

        return $this;
    }

    /**
     * Remove personas
     *
     * @param \MPM\EntityBundle\Entity\Persona $personas
     */
    public function removePersona(\MPM\EntityBundle\Entity\Persona $personas)
    {
        $this->personas->removeElement($personas);
    }

    /**
     * Get personas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * Add domicilios
     *
     * @param \MPM\EntityBundle\Entity\Domicilio $domicilios
     * @return Telefono
     */
    public function addDomicilio(\MPM\EntityBundle\Entity\Domicilio $domicilios)
    {
        $this->domicilios[] = $domicilios;

        return $this;
    }

    /**
     * Remove domicilios
     *
     * @param \MPM\EntityBundle\Entity\Domicilio $domicilios
     */
    public function removeDomicilio(\MPM\EntityBundle\Entity\Domicilio $domicilios)
    {
        $this->domicilios->removeElement($domicilios);
    }

    /**
     * Get domicilios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomicilios()
    {
        return $this->domicilios;
    }
}
