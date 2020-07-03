<?php

namespace Alura\Doctrine\Entity;

//O mapeamento é no doctrine é feito através do annotationss
/**
 * @Entity
 */
class Aluno
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nome;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    //O tipo self significa que estamos retornando
    //uma instância  para o próprio objeto
    public function setNome(string  $nome): self
    {
        $this->nome = $nome;
        return $this;

    }


}