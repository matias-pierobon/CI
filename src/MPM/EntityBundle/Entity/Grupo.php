<?php

namespace MPM\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="grupos")
 * @ORM\Entity(repositoryClass="MPM\EntityBundle\Entity\GrupoRepository")
 */
class Grupo
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="grupos")
     * @ORM\JoinTable(name="roles_groups",
     *      joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     *      )
     **/
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="Permiso", inversedBy="grupos")
     * @ORM\JoinTable(name="permisos_groups",
     *      joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="permiso_id", referencedColumnName="id")}
     *      )
     **/
    private $permisos;

    /**
     * @ORM\ManyToMany(targetEntity="Persona", inversedBy="grupos")
     * @ORM\JoinTable(name="personas_groups",
     *      joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="persona_id", referencedColumnName="id")}
     *      )
     **/
    private $personas;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->personas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Grupo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Grupo
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

    /**
     * Add roles
     *
     * @param \MPM\EntityBundle\Entity\Role $roles
     * @return Grupo
     */
    public function addRole(\MPM\EntityBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \MPM\EntityBundle\Entity\Role $roles
     */
    public function removeRole(\MPM\EntityBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Add permisos
     *
     * @param \MPM\EntityBundle\Entity\Permiso $permisos
     * @return Grupo
     */
    public function addPermiso(\MPM\EntityBundle\Entity\Permiso $permisos)
    {
        $this->permisos[] = $permisos;

        return $this;
    }

    /**
     * Remove permisos
     *
     * @param \MPM\EntityBundle\Entity\Permiso $permisos
     */
    public function removePermiso(\MPM\EntityBundle\Entity\Permiso $permisos)
    {
        $this->permisos->removeElement($permisos);
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Add personas
     *
     * @param \MPM\EntityBundle\Entity\Persona $personas
     * @return Grupo
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
}
