<?php

namespace AhmedTechT\Generator\Base;

use AhmedTechT\Generator\Utils\PaginatorMeta;
use AhmedTechT\Generator\Utils\Constants;
use AhmedTechT\Generator\Base\ProjectBaseController as Controller;
use AhmedTechT\Generator\Traits\HttpResponses;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    use HttpResponses;

    // These must be defined in the child 
    protected $service;
    protected string $resourceClass;
    protected string $storeRequest;
    protected string $updateRequest;

    protected string $searchRequest;


    public function index(Request $request)
    {
        $items = $this->service->findAll();
        return $this->success(($this->resourceClass)::collection($items));
    }

    public function getPaginatedItems(Request $request)
    {
        // Using dynamic pagination defaults
        $perPage = $request->input('per_page', Constants::DEFAULT_PER_PAGE);

        $items = $this->service->getPaginatedItems($perPage);
        $meta = new PaginatorMeta($items);

        return $this->success(
            data: ($this->resourceClass)::collection($items),
            meta: $meta->toArray()
        );
    }

    public function search(Request $request)
    {
        $request = app($this->searchRequest);

        $dto = $request->toDto();
        $perPage = $request->input('per_page', Constants::DEFAULT_PER_PAGE);
        $items = $this->service->search($dto, $perPage);
        $meta = new PaginatorMeta($items);
        return $this->success(data: ($this->resourceClass)::collection($items), meta: $meta->toArray());
    }

    public function store()
    {
        $request = app($this->storeRequest);
        $dto = $request->toDto();
        $entity = $this->service->create($dto);
        return $this->success(($this->resourceClass)::make($entity));
    }

    public function show(int $id)
    {
        $item = $this->service->findById($id);
        return $this->success(($this->resourceClass)::make($item));
    }


    public function update(int $id)
    {
        $request = app($this->updateRequest);
        $dto = $request->toDto();
        $item = $this->service->update($dto, $id);
        return $this->success(($this->resourceClass)::make($item));
    }

    public function destroy(int $id)
    {
        $message = $this->service->destroy($id);
        return $this->success($message);
    }
}