<?php namespace App\Repositiories\src\Contracts\Ftp;

interface FtpInterface
{
    /**
     * @param String $id
     * @return mixed
     */
    public function findById($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function save(array $data);

    /**
     * @param String $id
     * @return mixed
     */
    public function update($id);

    /**
     * @param String $id
     * @return mixed
     */
    public function delete($id);

}