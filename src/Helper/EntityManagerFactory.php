<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class EntityManagerFactory
{
    #Entidade neste quesito significa mapear os
    #objetos do negócio para o banco de dados
    #e para mapear o doctrine precisa de um gerenciador
    #que é o que vamos implementar abaixo
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }
}