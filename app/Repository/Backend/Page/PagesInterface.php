<?php


namespace App\Repository\Backend\Page;


interface PagesInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    public function getById(int $id);

    /**
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param  int  $id
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function update(int $id, array $attributes);

    /**
     * @param  int  $id
     *
     * @return mixed
     */
    public function delete(int $id);

    public function getForDataTable();
}
