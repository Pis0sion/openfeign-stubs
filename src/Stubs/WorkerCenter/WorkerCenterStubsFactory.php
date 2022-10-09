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
 * \Pis0sion\OpenfeignStubs\Stubs\WorkerCenter\WorkerCenterStubs.
 */
class WorkerCenterStubsFactory extends OpenFeignClient implements WorkerCenterServiceFactoryInterface
{
    /**
     * @var string
     */
    protected $serviceName = 'worker-center';

    /**
     * getProviderProfileByLaunch
     * @param string $username
     * @param string $password
     * @param string $remoteAddr
     * @return mixed
     */
    public function getProviderProfileByLaunch(string $username, string $password, string $remoteAddr = '127.0.0.1')
    {
        return $this->__request(__FUNCTION__, compact('username', 'password', 'remoteAddr'));
    }

    /**
     * getMembersStatisticsByAreaIDOrCategoryIDs
     * @param int $areaID
     * @param int $categoryID
     * @return mixed
     */
    public function getMembersStatisticsByAreaIDOrCategoryID(int $areaID = 0, int $categoryID = 0)
    {
        return $this->__request(__FUNCTION__, compact('areaID', 'categoryID'));
    }
}
