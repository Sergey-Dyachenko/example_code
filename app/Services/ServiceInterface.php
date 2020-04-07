<?php


namespace App\Services;


interface ServiceInterface
{
    public function all();

    public function create(array $input);

    public function find($id);

    public function update($id, array  $input);

    public function delete($id);

    public function countAll();
}
