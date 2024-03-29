<?php declare(strict_types=1);

namespace Circli\Cli;

use Sunkan\Enum\Enum;

/**
 * @method static Environment PRODUCTION()
 * @method static Environment DEVELOPMENT()
 * @method static Environment STAGING()
 * @method static Environment TESTING()
 */
final class Environment extends Enum
{
	public const PRODUCTION = 'production';
	public const DEVELOPMENT = 'development';
	public const STAGING = 'staging';
	public const TESTING = 'testing';
}
