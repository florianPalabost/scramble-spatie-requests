<?php

namespace Fp\Extensions\Features;

use Dedoc\Scramble\Support\Generator\Types\IntegerType;
use Dedoc\Scramble\Support\Generator\Types\ObjectType;
use Fp\Extensions\Feature;

class JsonApiPaginateFeature extends Feature
{
    public static function getFeatures(): array
    {
        $pageSchema = (new ObjectType);
        $pageSchema->addProperty('number', (new IntegerType)->setDescription('The page number to return'));
        $pageSchema->addProperty('size', (new IntegerType)->setDescription('The number of items to return per page'));

        return [
            new static(
                methodName: config('json-api-paginate.method_name', 'jsonPaginate'),
                queryParameterKey: config('json-api-paginate.pagination_parameter', 'page'),
                example: ['page[number]=1'],
                description: 'The page number to return',
                schemaType: $pageSchema,
            ),
        ];
    }
}