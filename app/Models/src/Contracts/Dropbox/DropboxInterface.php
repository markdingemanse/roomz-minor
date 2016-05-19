<?php namespace App\Models\src\Contracts\Dropbox;

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 1-4-2016
 * Time: 09:54
 */
interface DropboxInterface
{
    public function query();

    public function find($id);

    public function save($data);

    public function update($id);

    public function delete($id);
}
