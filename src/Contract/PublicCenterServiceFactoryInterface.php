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
 * \Pis0sion\OpenfeignStubs\Contract\PublicCenterServiceFactoryInterface.
 */
interface PublicCenterServiceFactoryInterface
{
    /**
     * sendVerifyCodeByScene.
     * @return mixed
     */
    public function sendVerifyCodeByScene(string $mobile = '', int $verifyCode = 1000);
}
