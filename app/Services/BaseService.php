<?php


namespace App\Services;


use App\Repositories\RepositoryInterface;

class BaseService implements ServiceInterface
{
    protected $repo;

    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function create(array $input)
    {
        return $this->repo->create($input);
    }

    public function find($id)
    {
        return $this->repo->show($id);
    }

    function update( $request, $id)
    {
        return $this->repo->update($request, $id) ;
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function allWithRelation($relation)
    {
        return $this->repo->allWithRelation($relation);
    }

    public function countAll()
    {
        return $this->repo->countAll();
    }
}
