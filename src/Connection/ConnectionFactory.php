<?php declare(strict_types = 1);

namespace Oli\RabbitMq\Connection;

/**
 * Class ConnectionFactory
 * Copyright (c) 2017 Sportisimo s.r.o.
 * @package Oli\RabbitMq\Connection
 */
final class ConnectionFactory
{

  /**
   * @var Connection[]
   */
  private $connections = [];

  /**
   * @var array|ConnectionProvider[]
   */
  private $connectionProviders;

  /**
   * ConnectionFactory constructor.
   * @param array $connectionProviders
   */
  public function __construct(array $connectionProviders)
  {
    $this->connectionProviders = $connectionProviders;
  }

  /**
   * @param string $name
   * @param ConnectionProvider $connectionProvider
   * @return Connection
   */
  public function getConnection(string $name, ?ConnectionProvider $connectionProvider = null): Connection
  {
    if(!isset($this->connections[$name]))
    {
      $this->connections[$name] = new Connection($connectionProvider ?? $this->connectionProviders[$name]);
    }

    return $this->connections[$name];
  }

}
