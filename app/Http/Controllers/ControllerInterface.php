<?php namespace App\Http\Controllers;

interface ControllerInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param String $id
     * @return mixed
     */
    public function show($id);

    /**
     * @param String $id
     * @return mixed
     */
    public function update($id);

    /**
     * @param String $id
     * @return mixed
     */
    public function destroy($id);

}