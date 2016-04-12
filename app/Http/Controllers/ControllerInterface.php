<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 31-3-2016
 * Time: 11:13
 */

namespace App\Http\Controllers;


interface ControllerInterface
{
    public function store(array $data);

    public function show($id);

    public function update($id);

    public function destroy($id);

}