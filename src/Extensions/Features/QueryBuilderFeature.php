<?php

namespace Fp\ScrambleSpatieRequests\Extensions\Features;

use Dedoc\Scramble\Support\Generator\Types\ObjectType;
use Fp\ScrambleSpatieRequests\Extensions\Feature;

class QueryBuilderFeature extends Feature
{
    const ALLOWED_INCLUDED_METHOD = 'allowedIncludes';

    const ALLOWED_FILTERS_METHOD = 'allowedFilters';

    const ALLOWED_SORTS_METHOD = 'allowedSorts';

    const ALLOWED_FIELDS_METHOD = 'allowedFields';

    public static function getFeatures(): array
    {
        return [
            new self(
                methodName: static::ALLOWED_INCLUDED_METHOD,
                queryParameterKey: config('query-builder.parameters.include', 'include'),
                example: ['posts', 'posts.comments', 'books'],
                description: 'Comma-separated list of relations to include in the response.'
            ),
            new self(
                methodName: static::ALLOWED_FILTERS_METHOD,
                queryParameterKey: config('query-builder.parameters.filter', 'filter'),
                example: ['[name]=john', '[email]=gmail'],
                schemaType: new ObjectType,
                description: 'List of filters to apply to the query builder.'
            ),
            new self(
                methodName: static::ALLOWED_SORTS_METHOD,
                queryParameterKey: config('query-builder.parameters.sort', 'sort'),
                example: ['title', '-title', 'title,-id'],
                description: 'List of sorts to apply to the query builder.'
            ),
            new self(
                methodName: static::ALLOWED_FIELDS_METHOD,
                queryParameterKey: config('query-builder.parameters.fields', 'fields'),
                example: ['id', 'title', 'posts.id'],
                schemaType: new ObjectType,
                description: 'List of fields to include in the query builder.'
            ),
        ];
    }
}
