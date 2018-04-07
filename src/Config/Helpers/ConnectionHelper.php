<?php declare(strict_types = 1);

namespace Oli\RabbitMq\Config\Helpers;

use Nette\DI\ContainerBuilder;
use Oli\RabbitMq\Connection\ConnectionFactory;
use Oli\RabbitMq\Connection\ConnectionProvider;

/**
 * Class ConnectionHelper
 * Copyright (c) 2017 Sportisimo s.r.o.
 * @package Oli\RabbitMq\Config\Helpers
 */
class ConnectionHelper extends AHelper
{

  /**
   * @var array
   */
  protected $defaults = [
    'host' => '127.0.0.1',
    'port' => 5672,
    'user' => 'guest',
    'password' => 'guest',
    'vhost' => '/',
    'heartbeat' => 20.0,
    'connectionTimeout' => 3.0,
    'readWriteTimeout' => 40.0,
  ];

  /**
   * @param ContainerBuilder $builder
   * @param array $config
   * @return void
   * @throws \Nette\InvalidArgumentException
   * @throws \Nette\InvalidStateException
   */
  public function setup(ContainerBuilder $builder, array $config = []): void
  {
    $connectionsConfig = [];
    foreach($config as $connectionName => $connectionData)
    {
      $connectionsConfig[$connectionName] = new ConnectionProvider($this->extension->validateConfig(
        $this->getDefaults(), $connectionData
      ));

      $builder->addDefinition($this->extension->prefix('connectionFactory'))
        ->setFactory(ConnectionFactory::class, [$connectionsConfig]);
    }

  }

}
