<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
// $alunoRepository = $entityManager->getRepository(Aluno::class);

// Variável para trabalhar através do terminal
$id = $argv[1];
$novoNome = $argv[2];

// Lembrando que o método getEntityManager() 
// pega somente o método find() e não outros
$aluno = $entityManager->find(Aluno::class, $id);
$aluno->setNome($novoNome);

$entityManager->flush();