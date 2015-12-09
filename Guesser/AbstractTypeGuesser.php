<?php

namespace CosmoW\DoctrineRiakAdminBundle\Guesser;

use Doctrine\ORM\Mapping\MappingException;
use Sonata\AdminBundle\Guesser\TypeGuesserInterface;
use CosmoW\DoctrineRiakAdminBundle\Model\ModelManager;

abstract class AbstractTypeGuesser implements TypeGuesserInterface
{
    /**
     * @param string                                                $baseClass
     * @param string                                                $propertyFullName
     * @param CosmoW\DoctrineRiakAdminBundle\Model\ModelManager $modelManager
     *
     * @return array|null
     */
    protected function getParentMetadataForProperty($baseClass, $propertyFullName, ModelManager $modelManager)
    {
        try {
            return $modelManager->getParentMetadataForProperty($baseClass, $propertyFullName);
        } catch (MappingException $e) {
            // no metadata not found.
            return;
        }
    }
}
