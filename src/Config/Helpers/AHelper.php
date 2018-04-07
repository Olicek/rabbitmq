<?php declare(strict_types = 1);

namespace Oli\RabbitMq\Config\Helpers;

use Oli\RabbitMq\Config\RabbitMqExtension;

/**
 * Class AHelper
 * Copyright (c) 2017 Sportisimo s.r.o.
 * @package Oli\RabbitMq\Config\Helpers
 */
abstract class AHelper
{

  /**
   * @var array
   */
  protected $defaults = [];

  /**
   * @var RabbitMqExtension
   */
  protected $extension;

  public function __construct(RabbitMqExtension $extension)
  {
    $this->extension = $extension;
  }

  public function getDefaults(): array
  {
    return $this->defaults;
  }

}
