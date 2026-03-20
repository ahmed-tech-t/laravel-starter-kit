<?php

namespace AhmedTechT\Generator\Base;

abstract class BaseService
{
    // The child class must define the repository
    protected object $repo;
    protected string $entityClass;

    protected $defaultCodeChar;


    public function findAll()
    {
        return ($this->repo)->findAll();
    }

    public function getPaginatedItems($perPage)
    {
        return ($this->repo)->getPaginatedItems($perPage);
    }

    public function search($dto, $perPage)
    {
        return ($this->repo)->search($dto, $perPage);
    }

    public function findById(int $id)
    {
        return ($this->repo)->findById($id);
    }

    public function destroy(int $id)
    {
        return ($this->repo)->destroy($id);
    }

    public function update($dto, int $id)
    {
        $entity = ($this->repo)->findById($id);
        return ($this->repo)->update($entity->update($dto->toArray()));
    }


    public function create($dto)
    {
        $entity = ($this->entityClass)::create($dto->toArray());
        return ($this->repo)->create($entity);
    }


}