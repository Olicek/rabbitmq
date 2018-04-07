<?php declare(strict_types = 1);

namespace Oli\RabbitMq\Config;

use Nette\DI\CompilerExtension;
use Oli\RabbitMq\Config\Helpers\ConnectionHelper;

/**
 * Class RabbitMqExtension
 * Copyright (c) 2017 Sportisimo s.r.o.
 */
class RabbitMqExtension extends CompilerExtension
{

  /**
   * @var array
   */
  private const DEFAULTS = [
    'connections' => [],
    'queues' => [],
    'exchanges' => [],
    'producers' => [],
    'consumers' => [],
  ];

  /**
   * @var ConnectionHelper
   */
  private $connectionHelper;

  /**
   * RabbitMqExtension constructor.
   */
  public function __construct()
  {
    $this->connectionHelper = new ConnectionHelper($this);
  }

  /**
   * @throws \Nette\InvalidArgumentException
   * @throws \Nette\InvalidStateException
   */
  public function loadConfiguration(): void
  {
    $config = $this->validateConfig(self::DEFAULTS, $this->getConfig());
    $builder = $this->getContainerBuilder();

    $this->connectionHelper->setup($builder, $config['connections']);
  }

}
