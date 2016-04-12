<?php namespace App\Http\Controllers\Dropbox;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerInterface;
use App\Repositiories\src\Providers\Dropbox\DropboxRepository;

/**
 * Created by PhpStorm.
 * User: Steef van de Gruiter
 * Date: 29-3-2016
 * Time: 15:16
 */
class DropboxController extends Controller implements ControllerInterface
{
    private $dropboxRepository;

    public function __construct(DropboxRepository $dropboxRepository)
    {
        $this->dropboxRepository = $dropboxRepository;
    }

    public function store(array $data)
    {
        $this->dropboxRepository->save($data);
    }

    public function show($id)
    {
        $this->dropboxRepository->findById($id);
    }

    public function update($id)
    {
        $this->dropboxRepository->update($id);
    }

    public function destroy($id)
    {
        $this->dropboxRepository->delete($id);
    }

}