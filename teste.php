<?php

use Alura\Doctrine\Helper\EntityManagerFactory;

// A constante mágica pega o diretório atual que 
//  vai desde C:\CursoDoctrineOrm até /vendor/autoload.php
require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

var_dump($entityManager->getConnection());