<?php declare(strict_types=1);

namespace Circli\Cli;

use Circli\Cli\Command\ContainerCompiler;
use Circli\Contracts\ExtensionInterface;
use Circli\Contracts\InitCliApplication;
use Circli\Contracts\PathContainer;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;

final class Extension implements ExtensionInterface, InitCliApplication
{
	public function __construct(PathContainer $paths)
	{
	}

	public function configure(): array
	{
		return [
			ContainerCompiler::class => function (ContainerInterface $container) {
				$config = $container->get(Config::class);
				return new ContainerCompiler($config->get('app.basePath'));
			}
		];
	}

	public function initCli(Application $cli, ContainerInterface $container)
	{
		$cli->add($container->get(ContainerCompiler::class));
	}
}
