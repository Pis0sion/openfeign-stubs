<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Pis0sion\OpenfeignStubs;

use Pis0sion\OpenfeignStubs\Contract\AddressCenterServiceFactoryInterface;
use Pis0sion\OpenfeignStubs\Contract\CommodityCenterServiceFactoryInterface;
use Pis0sion\OpenfeignStubs\Contract\PublicCenterServiceFactoryInterface;
use Pis0sion\OpenfeignStubs\Contract\WorkerCenterServiceFactoryInterface;
use Pis0sion\OpenfeignStubs\Stubs\AddressCenter\AddressCenterStubsFactory;
use Pis0sion\OpenfeignStubs\Stubs\CommodityCenter\CommodityCenterStubsFactory;
use Pis0sion\OpenfeignStubs\Stubs\PublicCenter\PublicCenterStubsFactory;
use Pis0sion\OpenfeignStubs\Stubs\WorkerCenter\WorkerCenterStubsFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                PublicCenterServiceFactoryInterface::class => PublicCenterStubsFactory::class,
                WorkerCenterServiceFactoryInterface::class => WorkerCenterStubsFactory::class,
                AddressCenterServiceFactoryInterface::class => AddressCenterStubsFactory::class,
                CommodityCenterServiceFactoryInterface::class => CommodityCenterStubsFactory::class,
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
        ];
    }
}
