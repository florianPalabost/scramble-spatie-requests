<?php

declare(strict_types=1);

namespace Fp\ScrambleSpatieRequests\Extensions;

use Dedoc\Scramble\Support\Generator\Types\StringType;
use Dedoc\Scramble\Support\Generator\Types\Type;

abstract class Feature
{
    /** @return Feature[] */
    abstract public static function getFeatures(): array;

    public function __construct(
        protected string $methodName,
        protected string $queryParameterKey,
        protected array $example = [],
        protected array $values = [],
        protected Type $schemaType = new StringType,
        protected string $description = '',
    ) {

    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function getQueryParameterKey(): string
    {
        return $this->queryParameterKey;
    }

    public function getExample(): array
    {
        return $this->example;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }

    public function getSchemaType(): Type
    {
        return $this->schemaType;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
