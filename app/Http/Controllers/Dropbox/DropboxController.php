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

    private $rules = [
        'store' => [
            'file' => 'required'
        ]
    ];

    public function __construct(DropboxRepository $dropboxRepository)
    {
        $this->dropboxRepository = $dropboxRepository;
    }

    public function store()
    {
        // dd(\Request::only('file'));
        $validator = \Validator::make(
            \Request::only('file'),
            $this->rules['store']
        );

        if ($validator->fails()) {
            throw new \Exception(
                'Not all data passed the validation ', 404
            );
        }

        $postArray = \Request::input();

        $jobId = \Queue::push(
            'App\Services\RoomzDropboxService',
            $postArray,
            'api-proxy-roomz'
        );
        return '204';
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
