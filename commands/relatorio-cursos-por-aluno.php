<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunosRepository = $entityManager->getRepository(Aluno::class);

// A classe DebugStack() é uma classe de log e serve para auxiliar 
// a gente quando se trata de log/registros 
$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

/** @var Aluno[] $alunos */
$alunos = $alunosRepository->findAll();

foreach ($alunos as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })
        ->toArray();

    echo "ID: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(", ", $telefones) . "\n";


    $cursos = $aluno->getCursos();
    foreach ($cursos as $curso) {
        echo "\tID Curso: {$curso->getId()}\n";
        echo "\tCurso: {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n";
}

// print_r($debugStack);

echo "\n";

foreach ($debugStack->queries as $queryinfo) {
    echo $queryinfo['sql'] . "\n";
}

