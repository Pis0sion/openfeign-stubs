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

use Pis0sion\Openfeign\Annotation\OpenFeignRouter;
use Pis0sion\Openfeign\OpenFeignClient;
use Pis0sion\OpenfeignStubs\Contract\AddressCenterServiceFactoryInterface;

/**
 * \Pis0sion\OpenfeignStubs\Stubs\AddressCenter\AddressCenterStubs.
 */
class AddressCenterStubsFactory extends OpenFeignClient implements AddressCenterServiceFactoryInterface
{
    /**
     * @var string
     */
    protected $serviceName = 'address-center';

    /**
     * getSubAreaListByPid.
     * @return mixed
     */
    #[OpenFeignRouter(path: '/address/area/rpc/get', method: 'GET')]
    public function getSubAreaListByPid(int $pId = 0)
    {
        return $this->__request(__FUNCTION__, compact('pId'));
    }

    /**
     * discern2AddressForNewVersion.
     * @return mixed
     */
    #[OpenFeignRouter(path: '/address/area/rpc/recNew', method: 'GET')]
    public function discern2AddressForNewVersion(string $address = '')
    {
        return $this->__request(__FUNCTION__, compact('address'));
    }

    /**
     * recognitionAddressByInformation.
     * @return mixed
     */
    #[OpenFeignRouter(path: '/address/area/rpc/recognitionAddress', method: 'POST')]
    public function recognitionAddressByInformation(string $provinceName = '', string $cityName = '', string $countyName = '', string $townName = '', string $detailName = '')
    {
        return $this->__request(__FUNCTION__, compact('provinceName', 'cityName', 'countyName', 'townName', 'detailName'));
    }
}
