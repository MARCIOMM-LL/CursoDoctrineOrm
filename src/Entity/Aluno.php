<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nome;
    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"})
     */
    private $telefones;

    public function __construct()
    {
        // O ArrayCollection() é uma biblioteca do doctrine
        // que serve para trabalhar com arrays com algumas 
        // funcionadidade que ela fornece
        $this->telefones = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addTelefone(Telefone $telefone)
    {
        // O método add() faz parte da biblioteca 
        // ArrayCollection() do doctrine
        $this->telefones->add($telefone);
        $telefone->setAluno($this);

        return $this;
    }

    // O retorna do método getTelefones(): Collection
    // também faz parte da bibliotaca do doctrine 
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }
}
