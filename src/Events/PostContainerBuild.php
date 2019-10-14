<?php declare(strict_types=1);

namespace Circli\Cli\Events;

use Circli\Cli\Container;

final class PostContainerBuild
{
	/** @var Container */
	private $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function getContainer(): Container
	{
		return $this->container;
	}
}