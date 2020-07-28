<?php


namespace App\Repository\Backend\Post;


interface PostRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function create(array $attributes);

    public function update(int $id, array $attributes);

    public function delete(int $id);
}
