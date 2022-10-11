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
namespace Pis0sion\OpenfeignStubs\Visitor;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\NodeVisitorAbstract;

/**
 * \Pis0sion\OpenfeignStubs\Visitor\ClassMethodStmtVisitor.
 */
class ClassMethodStmtVisitor extends NodeVisitorAbstract
{
    /**
     * leaveNode.
     * @return null|void
     */
    public function leaveNode(Node $node)
    {
        // stmts method body
        if ($node instanceof Node\Stmt\ClassMethod) {
            $node->stmts = [
                new Node\Stmt\Return_(
                    new Node\Expr\MethodCall(
                        new Node\Expr\Variable('this'),
                        new Node\Identifier('__request'),
                        [
                            new Arg(new Node\Scalar\MagicConst\Function_()),
                            $this->acquireClassMethodArgumentsStmts($node),
                        ]
                    )
                ),
            ];
        }

        return null;
    }

    /**
     * acquireClassMethodParameters.
     * @return array
     */
    protected function acquireClassMethodParameters(ClassMethod $classMethod)
    {
        $arguments = [];

        foreach ($classMethod->getParams() as $methodParam) {
            $arguments[] = new Arg(new String_($methodParam->var->name));
        }

        return $arguments;
    }

    /**
     * acquireClassMethodArgumentsStmts.
     * @return \PhpParser\Node\Arg
     */
    protected function acquireClassMethodArgumentsStmts(ClassMethod $classMethod)
    {
        $arguments = $this->acquireClassMethodParameters($classMethod);

        if (count($arguments) > 0) {
            return new Arg(new Node\Expr\FuncCall(new Node\Name('array_filter'), [
                new Arg(new Node\Expr\FuncCall(new Node\Name('compact'), $this->acquireClassMethodParameters($classMethod))),
            ]));
        }

        return new Arg(new Node\Expr\Array_([]));
    }
}
