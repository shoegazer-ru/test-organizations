<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     *
     * @param Request   $request
     *
     * @return JsonResponse
     */
    public function getList(Request $request): JsonResponse
    {
        $request->validate([
            'limit' => ['nullable', 'integer'],
            'offset' => ['nullable', 'integer']
        ]);
        $builder = new Operation;
        $this->applyPagination($builder, $request);
        $builder->with(['seller', 'buyer']);
        return $this->response($builder->get()->toArray());
    }
}
