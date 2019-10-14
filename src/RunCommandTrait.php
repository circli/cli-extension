<?php declare(strict_types=1);

namespace Circli\Cli;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

trait RunCommandTrait
{
	/**
	 * @return Application
	 */
	abstract public function getApplication();

	public function runCommand(string $command, $args = null, ?OutputInterface $output = null, bool $interactive = true): int
	{
		if (class_exists($command) && method_exists($command, 'getDefaultName')) {
			$command = $command::getDefaultName();
		}

		if (!$command) {
			throw new \InvalidArgumentException('Could\'t find command');
		}

		$commandInstance = $this->getApplication()->find($command);
		if (is_array($args)) {
			if (isset($args[0])) {
				array_unshift($args, $commandInstance->getName());
				$input = new StringInput(implode(' ', $args));
			}
			else {
				$args['command'] = $commandInstance->getName();
				$input = new ArrayInput($args);
			}
		}
		else {
			$input = new StringInput($commandInstance->getName() . (is_string($args) ? ' ' . $args : ''));
		}
		$input->setInteractive($interactive);

		return $commandInstance->run($input, $output ?? new ConsoleOutput());
	}
}
