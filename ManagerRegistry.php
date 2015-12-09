<?php

namespace CosmoW\DoctrineRiakAdminBundle;

use CosmoW\ODM\Riak\RiakException;
use Symfony\Bridge\Doctrine\ManagerRegistry as BaseManagerRegistry;

class ManagerRegistry extends BaseManagerRegistry
{
    /**
     * Resolves a registered namespace alias to the full namespace.
     *
     * @param string $alias
     * @return string
     * @throws RiakException
     */
    public function getAliasNamespace($alias)
    {
        foreach (array_keys($this->getManagers()) as $name) {
            try {
                return $this->getManager($name)->getConfiguration()->getDocumentNamespace($alias);
            } catch (RiakException $e) {
            }
        }
        throw RiakException::unknownDocumentNamespace($alias);
    }
}
