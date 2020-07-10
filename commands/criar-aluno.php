<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno();
// A variável $argv[] serve para inserirmos valores através da linha 
// comando, e o array com o valor 1 serve para exibir todos os valores
// passados, ou seja, ao passar um valor para dentro deste arquivo, 
// o valor passado irá como parâmetro do método setNome()
// $argv — Array de argumentos passados para o script
// A partir do índice [1] temos todos os valores passados via CLI
$aluno->setNome($argv[1]);

// $argc — O número de argumentos passados para o script
for ($i = 2; $i < $argc; $i++) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);

    // O persist foi substituido pelo mapeamento
    // que é uma outra opção para quando se chama 
    // uma entidade filha da classe Aluno
    // $entityManager->persist($telefone);

    $aluno->addTelefone($telefone);
}

$entityManager->persist($aluno);

// O método flush() se faz necessário para inserir
// os dados no banco em todo o crud
$entityManager->flush();