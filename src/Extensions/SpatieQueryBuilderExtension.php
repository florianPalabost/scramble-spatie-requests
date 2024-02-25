<?php

declare(strict_types=1);

namespace Fp\ScrambleSpatieRequests\Extensions;

use Closure;
use Dedoc\Scramble\Extensions\OperationExtension;
use Dedoc\Scramble\Support\Generator\Operation;
use Dedoc\Scramble\Support\Generator\Parameter;
use Dedoc\Scramble\Support\Generator\Schema;
use Dedoc\Scramble\Support\RouteInfo;
use Fp\ScrambleSpatieRequests\Extensions\Features\JsonApiPaginateFeature;
use Fp\ScrambleSpatieRequests\Extensions\Features\QueryBuilderFeature;

class SpatieQueryBuilderExtension extends OperationExtension
{
    public static array $hooks = [];

    public static function hook(Closure $cb): void
    {
        self::$hooks[] = $cb;
    }

    /**
     * @return Feature[]
     */
    public function features(): array
    {
        /** @var Feature[] $features */
        $features = [];

        // TODO: Improve this with a scan of the Features folder
        if (\Composer\InstalledVersions::isInstalled('spatie/laravel-query-builder')) {
            $features = array_merge($features, QueryBuilderFeature::getFeatures());
        }

        if (\Composer\InstalledVersions::isInstalled('spatie/laravel-json-api-paginate')) {
            $features = array_merge($features, JsonApiPaginateFeature::getFeatures());
        }

        return $features;

    }

    public function handle(Operation $operation, RouteInfo $routeInfo): void
    {
        foreach ($this->features() as $feature) {
            /** @var \PhpParser\Node\Expr\MethodCall $methodCall */
            $methodCall = (new \PhpParser\NodeFinder)->findFirst(
                $routeInfo->methodNode(),
                fn (\PhpParser\Node $node) => // todo: check if the methodName is called on QueryBuilder
                    $node instanceof \PhpParser\Node\Expr\MethodCall && $node->name instanceof \PhpParser\Node\Identifier && $node->name->name === $feature->getMethodName()
            );

            if (! $methodCall) {
                continue;
            }

            $feature->setValues($this->getValues($methodCall));

            $parameter = Parameter::make(name: $feature->getQueryParameterKey(), in: 'query')
                ->description($feature->getDescription())
                ->setSchema(Schema::fromType($feature->getSchemaType()))
                ->example($feature->getExample());

            $halt = $this->runHooks($operation, $parameter, $feature);

            if (! $halt) {
                $operation->addParameters([$parameter]);
            }
        }
    }

    public function runHooks(Operation $operation, Parameter $parameter, Feature $feature): mixed
    {
        foreach (self::$hooks as $hook) {
            $halt = $hook($operation, $parameter, $feature);
            if ($halt) {
                return $halt;
            }
        }

        return false;
    }

    public function getValues(\PhpParser\Node\Expr\MethodCall $methodCall): array
    {
        // ->allowedIncludes()
        if (count($methodCall->args) === 0) {
            return [];
        }

        // ->allowedIncludes(['posts', 'posts.author'])
        if ($methodCall->args[0]->value instanceof \PhpParser\Node\Expr\Array_) {
            return array_map(function (\PhpParser\Node\Expr\ArrayItem $item) {
                if ($item->value instanceof \PhpParser\Node\Scalar\String_) {
                    return $item->value->value;
                }
            }, $methodCall->args[0]->value->items);
        }

        // ->allowedIncludes('posts', 'posts.author')
        if ($methodCall->args[0]->value instanceof \PhpParser\Node\Scalar\String_) {
            return array_map(function (\PhpParser\Node\Arg $arg) {
                if ($arg->value instanceof \PhpParser\Node\Scalar\String_) {
                    return $arg->value->value;
                }
            }, $methodCall->args);
        }

        // TODO: ->allowedIncludes(self::DEFAULT_INCLUDES)
        // if ($methodCall->args[0]->value instanceof \PhpParser\Node\Const_) {
        //     return [$methodCall->args[0]->value->value];
        // }

        return [];
    }
}
