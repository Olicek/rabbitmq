<?php declare(strict_types = 1);

namespace Oli\RabbitMq\Connection;

/**
 * Class ConnectionProvider
 * Copyright (c) 2017 Sportisimo s.r.o.
 * @package Oli\RabbitMq\Connection
 */
final class ConnectionProvider
{

  /**
   * @var array
   */
  private $data;

  /**
   * ConnectionProvider constructor.
   * @param array $data
   */
  public function __construct(array $data)
  {
    $this->data = $data;
  }

  /**
   * Return host.
   * @return string
   */
  public function getHost(): string
  {
    return $this->data['host'];
  } // getHost()

  /**
   * Return port.
   * @return int
   */
  public function getPort(): int
  {
    return $this->data['port'];
  } // getPort()

  /**
   * Return username for Rabbit MQ server.
   * @return string
   */
  public function getUser(): string
  {
    return $this->data['user'];
  } // getUser()

  /**
   * Return password for Rabbit MQ server.
   * @return string
   */
  public function getPassword(): string
  {
    return $this->data['password'];
  } // getPassword()

  /**
   * Return virual host for Rabbit MQ cluster.
   * @return string
   */
  public function getVhost(): string
  {
    return $this->data['vhost'];
  } // getVhost()

  /**
   *
   * @return float
   */
  public function getHearbeat(): float
  {
    return $this->data['heartbeat'];
  } // getHearbeat()

  /**
   * @return float
   */
  public function getConnectionTimeout(): float
  {
    return $this->data['connectionTimeout'];
  } // getConnectionTimeout()

  /**
   * @return float
   */
  public function getReadWriteTimeout(): float
  {
    return $this->data['readWriteTimeout'];
  } // getReadWriteTimeout()

}
