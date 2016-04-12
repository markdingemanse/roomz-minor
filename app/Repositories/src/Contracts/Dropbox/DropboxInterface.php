<?php namespace App\Repositiories\src\Contracts\Dropbox;

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 1-4-2016
 * Time: 09:54
 */
interface DropboxInterface
{
    public function query();

    public function findById($id);

    public function save(array $data);

    public function update();

    public function delete($id);

}