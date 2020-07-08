<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
// A variável $argv[] serve para inserirmos valores através da linha 
// comando, e o array com o valor 1 serve para exibir todos os valores
// passados, ou seja, ao passar um valor para dentro deste arquivo, 
// o valor passado irá como parâmetro do método setNome()
$aluno->setNome($argv[1]);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($aluno);

// O método flush() se faz necessário para inserir
// os dados no banco em todo o crud
$entityManager->flush();