<?php


namespace App\Http\Repositories;


interface Repository
{
public function getAll();
public function create($data);
public function findById($id);
public function update($data, $object);
public function destroy($object);
}
