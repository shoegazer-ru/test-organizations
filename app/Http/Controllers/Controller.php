<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class Controller
{
    protected $defaultLimit = 25;

    /**
     * @param array $data
     * 
     * @return JsonResponse
     */
    protected function response(array $data): JsonResponse
    {
        return new JsonResponse($data, 200);
    }

    /**
     * @param Model|Builder $builder
     * @param Request $request
     * 
     * @return void
     */
    protected function applyPagination(Model|Builder &$builder, Request $request): void
    {
        $limit = $request->get('limit', $this->defaultLimit);
        $builder = $builder->limit($limit);

        $offset = $request->get('offset');
        if ($offset) {
            $builder->offset($offset);
        }
    }
}
