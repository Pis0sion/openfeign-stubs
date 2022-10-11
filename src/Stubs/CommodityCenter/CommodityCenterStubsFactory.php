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
namespace Pis0sion\OpenfeignStubs\Stubs\CommodityCenter;

use Pis0sion\Openfeign\OpenFeignClient;
use Pis0sion\OpenfeignStubs\Contract\CommodityCenterServiceFactoryInterface;

/**
 * \Pis0sion\OpenfeignStubs\Contract\GoodsCenterServiceFactoryInterface.
 */
class CommodityCenterStubsFactory extends OpenFeignClient implements CommodityCenterServiceFactoryInterface
{
    /**
     * getServiceTypeList.
     * @return mixed
     */
    public function getServiceTypeList(int $status = 0, string $serviceName = '')
    {
        return $this->__request(__FUNCTION__, array_filter(compact('status', 'serviceName')));
    }
}
