<?php namespace App\Repositiories\src\Providers\Ftp;
use App\Models\src\Providers\Ftp\FtpModel;


class FtpRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new FtpModel();
    }

    public function findById($id)
    {
        $this->model->find($id);
    }

    public function save(array $data)
    {
        $this->model->save($data);
    }

    public function update($id)
    {
        $this->model->update($id);
    }

    public function delete($id)
    {
        $this->model->delete($id);
    }

}