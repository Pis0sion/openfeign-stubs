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

use App\Annotation\Authz;
use Pis0sion\Openfeign\OpenFeignClient;
use Pis0sion\OpenfeignStubs\Contract\PublicCenterServiceFactoryInterface;

/**
 * \Pis0sion\OpenfeignStubs\Contract\PublicCenterServiceFactoryInterface.
 */
class PublicCenterStubsFactory extends OpenFeignClient implements PublicCenterServiceFactoryInterface
{
    /**
     * sendVerifyCodeByScene.
     * @return mixed
     */
    public function sendVerifyCodeByScene(string $mobile = '', int $verifyCode = 1000)
    {
        return $this->__request(__FUNCTION__, array_filter(compact('mobile', 'verifyCode')));
    }

    #[Authz]
    public function testAst()
    {
        return $this->__request(__FUNCTION__, []);
    }

    #[Authz]
    public function testArea($name)
    {
        return $this->__request(__FUNCTION__, array_filter(compact('name')));
    }
}
