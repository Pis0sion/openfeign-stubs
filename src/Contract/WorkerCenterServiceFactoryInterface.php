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
 * \Pis0sion\OpenfeignStubs\Contract\WorkerCenterServiceFactoryInterface.
 */
interface WorkerCenterServiceFactoryInterface
{

    /**
     * getProviderProfileByLaunch
     * @param string $username
     * @param string $password
     * @param string $remoteAddr
     * @return mixed
     */
    public function getProviderProfileByLaunch(string $username, string $password, string $remoteAddr = '127.0.0.1');

    /**
     * getMembersStatisticsByAreaIDOrCategoryID
     * @param int $areaID
     * @param int $categoryID
     * @return mixed
     */
    public function getMembersStatisticsByAreaIDOrCategoryID(int $areaID = 0, int $categoryID = 0);

}
