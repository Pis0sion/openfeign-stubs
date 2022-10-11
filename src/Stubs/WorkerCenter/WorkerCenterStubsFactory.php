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
namespace Pis0sion\OpenfeignStubs\Stubs\WorkerCenter;

use Pis0sion\Openfeign\OpenFeignClient;
use Pis0sion\OpenfeignStubs\Contract\WorkerCenterServiceFactoryInterface;

/**
 * \Pis0sion\OpenfeignStubs\Contract\WorkerCenterServiceFactoryInterface.
 */
class WorkerCenterStubsFactory extends OpenFeignClient implements WorkerCenterServiceFactoryInterface
{
    /**
     * getProviderProfileByLaunch.
     * @return mixed
     */
    public function getProviderProfileByLaunch(string $username, string $password, string $remoteAddr = '127.0.0.1')
    {
        return $this->__request(__FUNCTION__, array_filter(compact('username', 'password', 'remoteAddr')));
    }

    /**
     * getMembersStatisticsByAreaIDOrCategoryID.
     * @return mixed
     */
    public function getMembersStatisticsByAreaIDOrCategoryID(int $areaID = 0, int $categoryID = 0)
    {
        return $this->__request(__FUNCTION__, array_filter(compact('areaID', 'categoryID')));
    }
}
