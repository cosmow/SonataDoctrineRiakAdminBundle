<?php

namespace CosmoW\DoctrineRiakAdminBundle\Filter;

use Sonata\AdminBundle\Filter\Filter as BaseFilter;

abstract class Filter extends BaseFilter
{
    protected $active = false;

    /**
     * {@inheritdoc}
     */
    public function apply($queryBuilder, $value)
    {
        $this->value = $value;

        $this->filter($queryBuilder, null, $this->getFieldName(), $value);
    }

    /**
     * {@inheritdoc}
     */
    public function isActive()
    {
        return $this->active;
    }
}
