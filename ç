<?php

namespace CosmoW\DoctrineRiakAdminBundle;

use Doctrine\ODM\MongoDB\MongoDBException;
use Symfony\Bridge\Doctrine\ManagerRegistry as BaseManagerRegistry;

class ManagerRegistry extends BaseManagerRegistry
{
    /**
     * Resolves a registered namespace alias to the full namespace.
     *
     * @param string $alias
     * @return string
     * @throws MongoDBException
     */
    public function getAliasNamespace($alias)
    {
        foreach (array_keys($this->getManagers()) as $name) {
            try {
                return $this->getManager($name)->getConfiguration()->getDocumentNamespace($alias);
            } catch (MongoDBException $e) {
            }
        }
        throw MongoDBException::unknownDocumentNamespace($alias);
    }
}
