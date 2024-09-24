<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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

    public function getStatistic(Request $request): JsonResponse
    {
        $request->validate([
            'limit' => ['nullable', 'integer'],
            'offset' => ['nullable', 'integer'],
            'id' => ['nullable', 'integer']
        ]);
        $builder = new Organization;
        $this->applyPagination($builder, $request);
        $this->applyFilter($builder, $request);
        $builder->withSum('sells as sells_sum', 'sum');
        $builder->withSum('buys as buys_sum', 'sum');
        return $this->response($builder->get()->toArray());
    }

    /**
     * @param Model|Builder $builder
     * @param Request $request
     * 
     * @return void
     */
    protected function applyFilter(Model|Builder &$builder, Request $request): void
    {
        if ($request->get('id')) {
            $builder->where('id', $request->get('id'));
        }
    }
}
