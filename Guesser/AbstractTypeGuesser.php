<?php

namespace CosmoW\DoctrineRiakAdminBundle\Guesser;

use Doctrine\ORM\Mapping\MappingException;
use Sonata\AdminBundle\Guesser\TypeGuesserInterface;
use Sonata\DoctrineMongoDBAdminBundle\Model\ModelManager;

abstract class AbstractTypeGuesser implements TypeGuesserInterface
{
    /**
     * @param string                                                $baseClass
     * @param string                                                $propertyFullName
     * @param \Sonata\DoctrineMongoDBAdminBundle\Model\ModelManager $modelManager
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
