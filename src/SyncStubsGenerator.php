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

namespace Pis0sion\OpenfeignStubs;

use Hyperf\Di\ReflectionManager;
use Hyperf\Utils\Composer;
use PhpParser\NodeTraverser;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;
use Pis0sion\OpenfeignStubs\Visitor\ClassMethodStmtVisitor;
use Pis0sion\OpenfeignStubs\Visitor\NamespaceStmtVisitor;
use SplFileInfo;

/**
 * \Pis0sion\OpenfeignStubs\SyncStubsGenerator.
 */
class SyncStubsGenerator
{
    /**
     * @var string
     */
    protected string $suffix = '.php';

    /**
     * @var \PhpParser\Parser
     */
    protected Parser $astParser;

    /**
     * @param string $scanDir
     * @param string $outDir
     */
    public function __construct(protected string $scanDir, protected string $outDir)
    {
        $this->astParser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
    }

    /**
     * generate
     * @param bool $format
     */
    public function generate(bool $format = true)
    {
        foreach ($this->acquireInterfacesScanDir() as $contractInterface) {
            $this->generateStubsHandle($contractInterface);
        }

        if ($format)
            shell_exec("composer cs-fix {$this->outDir}");
    }

    /**
     * acquireInterfacesScanDir
     * @return array
     */
    protected function acquireInterfacesScanDir(): array
    {
        $contractInterfaces = ReflectionManager::getAllClasses([$this->scanDir]);
        return array_keys($contractInterfaces);
    }

    /**
     * getFileInfoByContractInterface
     * @param string $interfaceName
     * @return array
     */
    protected function getFileInfoByContractInterface(string $interfaceName): array
    {
        $interfaceFilePath = Composer::getLoader()->findFile($interfaceName);

        $fileInfo = new SplFileInfo($interfaceFilePath);
        [$fileFullName, $fileName] = $this->getFileNameByFileInfo($fileInfo);
        return [$interfaceFilePath, $fileFullName, $fileName, ...$this->getGenDirByFileName($fileName)];
    }

    /**
     * getFileNameByFileInfo
     * @param \SplFileInfo $splFileInfo
     * @return array
     */
    protected function getFileNameByFileInfo(SplFileInfo $splFileInfo): array
    {
        $genFullFile = str_replace('ServiceFactoryInterface', 'StubsFactory', $splFileInfo->getFilename());
        return [$genFullFile, basename($genFullFile, $this->suffix)];
    }

    /**
     * getGenDirByFileName
     * @param string $fileBaseName
     * @return array
     */
    protected function getGenDirByFileName(string $fileBaseName): array
    {
        $genDir = str_replace('StubsFactory', '', $fileBaseName);
        $genFullDir = $this->outDir . DIRECTORY_SEPARATOR . $genDir;

        if (!is_dir($genFullDir)) {
            mkdir($genFullDir, 0755, true);
        }

        return [$genFullDir, $genDir];
    }

    /**
     * createTraverser
     * @param string $fileName
     * @param string $genDir
     * @return \PhpParser\NodeTraverser
     */
    protected function createTraverser(string $fileName, string $genDir): NodeTraverser
    {
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new NamespaceStmtVisitor($fileName, $genDir, [['Pis0sion', 'Openfeign', 'OpenFeignClient']]));
        $traverser->addVisitor(new ClassMethodStmtVisitor());
        return $traverser;
    }

    /**
     * prettyPrinter
     * @param array $stmts
     * @return string
     */
    protected function prettyPrinter(array $stmts): string
    {
        return (new Standard())->prettyPrintFile($stmts);
    }

    /**
     * generateStubsHandle
     * @param string $interfaceName
     * @return false|int
     */
    protected function generateStubsHandle(string $interfaceName)
    {
        [$interfaceFilePath, $fileFullName, $fileName, $genFullDir, $genDir] = $this->getFileInfoByContractInterface($interfaceName);
        $ast = $this->astParser->parse(file_get_contents($interfaceFilePath));
        $traverser = $this->createTraverser($fileName, $genDir);
        $stmts = $traverser->traverse($ast);
        $prettyPrinter = $this->prettyPrinter($stmts);
        return $this->putFileContent($genFullDir . DIRECTORY_SEPARATOR . $fileFullName, $prettyPrinter);
    }

    /**
     * putFileContent
     * @param string $filePath
     * @param string $content
     * @return false|int
     */
    protected function putFileContent(string $filePath, string $content)
    {
        return file_put_contents($filePath, $content);
    }
}
