<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Emprestimo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterialRepository")
 */
class Material
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ativo;

    /**
     * @ORM\Column(type="integer")
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoMaterial", inversedBy="materiais")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo;

    /** 
     * @ORM\OneToMany(targetEntity="Emprestimo",mappedBy="material")
     */
    private $emprestimos;

    public function __construct()
    {
        $this->emprestimos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getId();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAtivo(): ?bool
    {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo): self
    {
        $this->ativo = $ativo;

        return $this;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getTipo(): ?TipoMaterial
    {
        return $this->tipo;
    }

    public function setTipo(?TipoMaterial $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function setEmprestimos($emprestimos)
    {
        $this->emprestimos = $emprestimos;
        return $this;
    }

    public function getEmprestimos()
    {
        return $this->emprestimos;
    }

    public function addEmprestimo(Emprestimo $emprestimo)
    {
        $this->emprestimos[] = $emprestimo;

        return $this;
    }

    public function removeEmprestimo(Emprestimo $emprestimo)
    {
        $this->emprestimos->removeElement($emprestimo);
    }
}