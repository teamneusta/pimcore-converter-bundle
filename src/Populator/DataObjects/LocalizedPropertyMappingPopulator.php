<?php

namespace Neusta\Pimcore\ConverterBundle\Populator\DataObjects;

use Neusta\ConverterBundle\Exception\PopulationException;
use Neusta\ConverterBundle\Populator;
use Pimcore\Model\DataObject\AbstractObject;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

/**
 * @template TSource of AbstractObject
 * @template TTarget of object
 * @template TContext of object|null
 *
 * @implements Populator<TSource, TTarget, TContext>
 */
class LocalizedPropertyMappingPopulator implements Populator
{
    private PropertyAccessorInterface $accessor;

    public function __construct(
        private string            $targetProperty,
        private string            $sourceProperty,
        private string            $languageKey = 'language',
        PropertyAccessorInterface $accessor = null,
    )
    {
        $this->accessor = $accessor ?? PropertyAccess::createPropertyAccessor();
    }

    /**
     * @throws PopulationException
     */
    public function populate(object $target, object $source, ?object $ctx = null): void
    {
        $language = null;
        if ($ctx && $ctx->hasKey($this->languageKey)) {
            $language = $ctx->getValue($this->languageKey);
        }

        try {
            $this->accessor->setValue(
                $target,
                $this->targetProperty,
                $source->{'get' . ucfirst($this->sourceProperty)}($language)
            );
        } catch (\Throwable $exception) {
            throw new PopulationException($this->sourceProperty, $this->targetProperty, $exception);
        }
    }
}

