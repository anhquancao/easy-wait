<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:08 PM
 */

namespace App\Repositories;


interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function findAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}