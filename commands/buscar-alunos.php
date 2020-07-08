<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno) {
    // Para se ter acesso a métodos dentro de uma string eles 
    // ficam entre chaves/interpolação
    echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n\n";
}

$alunoEspecifico = $alunoRepository->find(2);
echo $alunoEspecifico->getNome() . "\n\n";

$marcio = $alunoRepository->findBy([
    'nome' => 'Leonardo Jargão'
]);

var_dump($marcio);