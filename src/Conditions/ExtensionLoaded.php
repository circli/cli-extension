<?php declare(strict_types=1);

namespace Circli\Cli\Conditions;

use Circli\Cli\Extensions;

final class ExtensionLoaded implements ConditionInterface
{
	/** @var string */
	private $extensionName;

	public function __construct(string $extensionName)
	{
		$this->extensionName = $extensionName;
	}

	public function evaluate(...$args): bool
	{
		foreach ($args as $arg) {
			if ($arg instanceof Extensions) {
				return $arg->isLoaded($this->extensionName);
			}
		}

		return false;
	}
}
