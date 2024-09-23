<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrganizationController extends Controller
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
        $builder = new Organization;
        $this->applyPagination($builder, $request);
        return $this->response($builder->get()->toArray());
    }
}
