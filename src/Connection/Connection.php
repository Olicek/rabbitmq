<?php declare(strict_types = 1);

namespace Oli\RabbitMq\Connection;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class Connection
 * Copyright (c) 2017 Sportisimo s.r.o.
 * @package Oli\RabbitMq\Connection
 */
final class Connection
{

  /**
   * @var AMQPStreamConnection
   */
  private $connection;

  /**
   * Array of AMQPChannels.
   * @var array
   */
  private $channels = [];

  /**
   * Connection constructor.
   * @param ConnectionProvider $connectionProvider
   */
  public function __construct(ConnectionProvider $connectionProvider)
  {
    $this->connection = new AMQPStreamConnection(
      $connectionProvider->getHost(),
      $connectionProvider->getPort(),
      $connectionProvider->getUser(),
      $connectionProvider->getPassword(),
      $connectionProvider->getVhost(),
      $insist = false,
      $login_method = 'AMQPLAIN',
      $login_response = null,
      $locale = 'en_US',
      $connectionProvider->getConnectionTimeout(),
      $connectionProvider->getReadWriteTimeout(),
      $context = null,
      $keepalive = false,
      $connectionProvider->getHearbeat()
    );
  }

  /**
   * @param int|null $channelId
   * @return AMQPChannel
   */
  public function getChannel(?int $channelId = null): AMQPChannel
  {
    return $this->channels[$channelId] = $this->connection->channel($channelId);
  }

  /**
   * Close connection
   */
  public function close(): void
  {
    foreach($this->channels as $channel)
    {
      $channel->close();
    }
    $this->connection->close();
  }

  public function __destruct()
  {
    $this->close();
  }

}
