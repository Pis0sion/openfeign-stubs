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
namespace Pis0sion\OpenfeignStubs\Stubs\AddressCenter;

use Pis0sion\Openfeign\OpenFeignClient;
use Pis0sion\OpenfeignStubs\Contract\AddressCenterServiceFactoryInterface;

/**
 * \Pis0sion\OpenfeignStubs\Contract\AddressCenterServiceFactoryInterface.
 */
class AddressCenterStubsFactory extends OpenFeignClient implements AddressCenterServiceFactoryInterface
{
    /**
     * getSubAreaListByPid.
     * @return mixed
     */
    public function getSubAreaListByPid(int $pId = 0)
    {
        return $this->__request(__FUNCTION__, array_filter(compact('pId')));
    }

    /**
     * recognitionAddressByInformation.
     * @return mixed
     */
    public function recognitionAddressByInformation(string $provinceName = '', string $cityName = '', string $countyName = '', string $townName = '', string $detailName = '')
    {
        return $this->__request(__FUNCTION__, array_filter(compact('provinceName', 'cityName', 'countyName', 'townName', 'detailName')));
    }

    /**
     * discern2AddressForNewVersion.
     * @return mixed
     */
    public function discern2AddressForNewVersion(string $address = '')
    {
        return $this->__request(__FUNCTION__, array_filter(compact('address')));
    }
}
