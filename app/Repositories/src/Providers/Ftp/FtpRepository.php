<?php namespace App\Repositiories\src\Providers\Ftp;

use App\Models\src\Providers\Ftp\FtpModel;

class FtpRepository
{
    /**
     * @var FtpModel
     */
    private $model;

    /**
     * FtpRepository constructor.
     */
    public function __construct()
    {
        $this->model = new FtpModel;
    }

    /**
     * @param $id
     * id = file you look for
     */
    public function findById($id)
    {
        $this->model->find($id);
    }

    /**
     * @param array $data
     * id = data to save
     */
    public function save(array $data)
    {
        $this->model->save($data);
    }

    /**
     * @param $id
     * id is update file
     */
    public function update($id)
    {
        $this->model->update($id);
    }

    /**
     * @param $id
     * id = delete file
     */
    public function delete($id)
    {
        $this->model->delete($id);
    }

}