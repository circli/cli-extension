<?php declare(strict_types=1);

namespace Circli\Cli\Events;

use Circli\Contracts\InitCliApplication;

final class InitExtension
{
	public function __construct(InitCliApplication $extension)
	{
	}
}