<?php
namespace AhmedTechT\Generator\Base;

use Illuminate\Pagination\LengthAwarePaginator;
interface BaseRepo
{

    public function search($dto, $perPage);
    public function findAll();
    public function findById(int $id);
    public function getPaginatedItems($perPage): LengthAwarePaginator;
    public function create($entity);
    public function update($entity);
    public function destroy(int $id): string;
}