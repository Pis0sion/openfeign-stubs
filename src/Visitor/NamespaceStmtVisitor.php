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
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\UseUse;
use PhpParser\NodeVisitorAbstract;

/**
 * \Pis0sion\OpenfeignStubs\Visitor\NamespaceStmtVisitor.
 */
class NamespaceStmtVisitor extends NodeVisitorAbstract
{
    /**
     * @var array
     */
    protected array $useStmtsNode = [];

    /**
     * @param string $genFileName
     * @param string $genStorageDir
     * @param array $namespaceStmts
     */
    public function __construct(protected string $genFileName, protected string $genStorageDir, protected array $namespaceStmts = [])
    {
    }

    /**
     * leaveNode
     * @param \PhpParser\Node $node
     * @return null
     */
    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\Namespace_) {
            foreach ($node->stmts as $originNodeStmtsNode) {
                if ($originNodeStmtsNode instanceof Node\Stmt\Use_) {
                    $this->useStmtsNode[] = $originNodeStmtsNode;
                }

                if ($originNodeStmtsNode instanceof Node\Stmt\Interface_) {
                    $originNamespaceParts = $node->name?->parts ?? [];
                    $stmtsNodeName = $this->acquireStmtsNodeNames($originNamespaceParts, $originNodeStmtsNode);
                    $node->name->parts = $this->getNamespaceParts();
                    $node->stmts = [
                        ...$this->useStmtsNode,
                        ...$this->getServiceFactoryUseNode($stmtsNodeName),
                        $this->getServiceFactoryClassNode($originNodeStmtsNode),
                    ];
                }
            }
        }

        return null;
    }

    /**
     * acquireStmtsNodeNames.
     * @return array
     */
    protected function acquireStmtsNodeNames(array $originNamespaceParts, Node $originNodeStmtsNode)
    {
        $this->namespaceStmts[] = [...$originNamespaceParts, $originNodeStmtsNode->name->toString()];
        return $this->namespaceStmts;
    }

    /**
     * getServiceFactoryUseNode.
     * @param array $stmtsNodeName
     */
    protected function getServiceFactoryUseNode($stmtsNodeName): array
    {
        $useNodes = [];

        foreach ($stmtsNodeName as $nodeName) {
            $useNodes[] = new Node\Stmt\Use_([new UseUse(new Name($nodeName))]);
        }
        return $useNodes;
    }

    /**
     * getServiceFactoryClassNode.
     * @param $originNodeStmtsNode
     */
    protected function getServiceFactoryClassNode(Node $originNodeStmtsNode): Node
    {
        return new Node\Stmt\Class_($this->genFileName, [
            'extends' => new Name(['OpenFeignClient']),
            'implements' => [new Name($originNodeStmtsNode?->name->toString())],
            'stmts' => $originNodeStmtsNode?->stmts,
        ], $originNodeStmtsNode->getAttributes());
    }

    /**
     * getNamespaceParts.
     * @return array
     */
    protected function getNamespaceParts()
    {
        return ['Pis0sion', 'OpenfeignStubs', 'Stubs', $this->genStorageDir];
    }
}
