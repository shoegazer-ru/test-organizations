<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class Controller
{
    protected $defaultLimit = 25;

    protected function response(array $data): JsonResponse
    {
        return new JsonResponse($data, 200);
    }

    protected function applyPagination(Model &$builder, Request $request)
    {
        $limit = $request->get('limit', $this->defaultLimit);
        $builder = $builder->limit($limit);

        $offset = $request->get('offset');
        if ($offset) {
            $builder->offset($offset);
        }
    }
}
