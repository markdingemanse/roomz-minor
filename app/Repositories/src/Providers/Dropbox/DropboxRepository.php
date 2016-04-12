<?php namespace App\Repositiories\src\Providers\Dropbox;

use App\Models\src\Providers\Dropbox\DropboxModel;

/**
 * Created by PhpStorm.
 * User: Steef van de Gruiter
 * Date: 1-4-2016
 * Time: 10:38
 */
class DropboxRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new DropboxModel();
    }

    public function query()
    {
        $this->model->query();
    }

    public function findById($id)
    {
        $this->model->find($id);
    }

    public function save(array $data)
    {
        $this->model->save($data);
    }

    public function update()
    {
        $this->model->update();
    }

    public function delete($id)
    {
        $this->model->delete($id);
    }

}