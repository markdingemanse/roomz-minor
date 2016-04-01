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

    public function index();

    public function store();

    public function show($id);

    public function edit($id);

    public function destory($id);

}