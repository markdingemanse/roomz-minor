<?php namespace App\Repositiories\src\Contracts\Ftp;

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 1-4-2016
 * Time: 10:35
 */
interface FtpInterface
{

    public function findById($id);

    public function save(array $data);

    public function update();

    public function delete($id);

}