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
namespace Pis0sion\OpenfeignStubs\Contract;

/**
 * \Pis0sion\OpenfeignStubs\Contract\AddressCenterServiceFactoryInterface.
 */
interface AddressCenterServiceFactoryInterface
{
    /**
     * getSubAreaListByPid.
     * @return mixed
     */
    public function getSubAreaListByPid(int $pId = 0);

    /**
     * recognitionAddressByInformation.
     * @return mixed
     */
    public function recognitionAddressByInformation(string $provinceName = '', string $cityName = '', string $countyName = '', string $townName = '', string $detailName = '');

    /**
     * discern2AddressForNewVersion.
     * @return mixed
     */
    public function discern2AddressForNewVersion(string $address = '');
}
