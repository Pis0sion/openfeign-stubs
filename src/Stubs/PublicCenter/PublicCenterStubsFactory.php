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
namespace Pis0sion\OpenfeignStubs\Stubs\PublicCenter;

use Pis0sion\Openfeign\OpenFeignClient;
use Pis0sion\OpenfeignStubs\Contract\PublicCenterServiceFactoryInterface;

/**
 * \Pis0sion\OpenfeignStubs\Stubs\PublicCenter\PublicCenterStubsFactory.
 */
class PublicCenterStubsFactory extends OpenFeignClient implements PublicCenterServiceFactoryInterface
{
    /**
     * @var string
     */
    protected $serviceName = 'public-center';

    /**
     * sendVerifyCodeByScene.
     * @return mixed
     */
    public function sendVerifyCodeByScene(string $mobile = '', int $verifyCode = 1000)
    {
        return $this->__request(__FUNCTION__, array_filter(compact('mobile', 'verifyCode')));
    }
}
