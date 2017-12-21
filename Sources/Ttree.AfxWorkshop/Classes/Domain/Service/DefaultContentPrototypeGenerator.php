<?php

namespace Ttree\AfxWorkshop\Domain\Service;

use Neos\ContentRepository\Domain\Model\NodeType;
use Neos\Flow\Annotations as Flow;
use Neos\Neos\Domain\Service\DefaultPrototypeGeneratorInterface;

/**
 * @Flow\Scope("singleton")
 * @api
 */
class DefaultContentPrototypeGenerator implements DefaultPrototypeGeneratorInterface
{
    /**
     * @var string
     */
    protected $basePrototypeName = 'Neos.Neos:ContentComponent';

    public function generate(NodeType $nodeType)
    {
        if (strpos($nodeType->getName(), ':') === false) {
            return '';
        }

        $output = 'prototype(' . $nodeType->getName() . ') < prototype(' . $this->basePrototypeName . ') {' . chr(10);
        $output .= 'renderer = \'Configure the prototype <b>' . $nodeType->getName() . '</b> ...\'' . chr(10);
        $output .= '}' . chr(10);
        return $output;
    }
}
