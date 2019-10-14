<?php declare(strict_types=1);

namespace Circli\Cli\Events;

use Circli\Contracts\InitAdrApplication;

final class InitModule
{
	/** @var InitAdrApplication */
	protected $module;

	public function __construct(InitAdrApplication $module)
	{
		$this->module = $module;
	}

	public function getModule(): InitAdrApplication
	{
		return $this->module;
	}
}
