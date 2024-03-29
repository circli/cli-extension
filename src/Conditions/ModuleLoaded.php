<?php declare(strict_types=1);

namespace Circli\Cli\Conditions;

use Circli\Cli\Extensions;

final class ModuleLoaded implements ConditionInterface
{
	/** @var string */
	private $moduleName;

	public function __construct(string $moduleName)
	{
		$this->moduleName = $moduleName;
	}

	public function evaluate(...$args): bool
	{
		foreach ($args as $arg) {
			if ($arg instanceof Extensions) {
				return $arg->isLoaded($this->moduleName);
			}
		}

		return false;
	}
}
