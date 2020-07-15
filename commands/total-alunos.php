<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
// $repository = $entityManager->getRepository(Aluno::class);

$classeAluno = Aluno::class;
$dql = "SELECT COUNT(a) FROM $classeAluno a";
// $alunoList = $repository->findAll();
$query = $entityManager->createQuery($dql);
// Um tipo escalar em programação é um tipo que
// somente retorna volores inteiros, e não nenhum
// objeto ou algum tipo complexo/classe
$totalAlunos = $query->getSingleScalarResult();

echo "Total de alunos: " . $totalAlunos;

