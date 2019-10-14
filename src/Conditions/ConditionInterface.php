<?php declare(strict_types=1);

namespace Circli\Cli\Conditions;

interface ConditionInterface
{
	public function evaluate(...$args): bool;
}
