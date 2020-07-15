<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

// Classe para gerenciar as entidades
class EntityManagerFactory
{
    #Entidade no doctrine significa mapear os objetos/classes
    #do negócio para o banco de dados e para mapear o doctrine
    #precisamos de um gerenciador de entidades que é o que
    #vamos implementar abaixo
    public function getEntityManager(): EntityManagerInterface
    {
        // Partindo do diretório Helper até a pasta src
        // depois da pasta src até a raiz do projeto CursoDoctrineOrm
        $rootDir = __DIR__ . '/../..';
        // Essa classe cria as configurações necessárias com base em annotations
        // que o doctrine precisa
        $config = Setup::createAnnotationMetadataConfiguration(
            // A configuração vai partir do diretório raiz até a pasta src. Ainda temos um outro parâmetro 
            // que é o true que fala se estamos em modo de desenvolvimento ou não, perde um pouco de performance 
            // mas traz mais informações
            [$rootDir . '/src'],
            true
        );
        // Aqui temos a conexão com o banco em questão e seu devido caminho
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'
        ];

        // Aqui temos o retorno da conexão através da classe create que faz a conaxão efetivamente
        return EntityManager::create($connection, $config);
    }
}