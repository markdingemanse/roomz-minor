<?php namespace App\Models\rc\Contracts\Ftp;

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 1-4-2016
 * Time: 10:35
 */
interface FtpInterface
{
    public function query();

    public function find($id);

    public function save($data);

    public function update($id);

    public function delete($id);

}