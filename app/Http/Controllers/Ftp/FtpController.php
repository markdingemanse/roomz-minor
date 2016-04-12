<?php namespace App\Http\Controllers\Ftp;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerInterface;
use App\Repositiories\src\Providers\Ftp\FtpRepository;


/**
 * Created by PhpStorm.
 * User: Steef van de Gruiter
 * Date: 29-3-2016
 * Time: 15:14
 */
class FtpController extends Controller implements ControllerInterface
{

    private $ftpRepository;

    public function __construct(FtpRepository $ftpRepository)
    {
        $this->FtpRepository = $ftpRepository;
    }

    public function store(array $data)
    {
        $this->ftpRepository->save($data);
    }

    public function show($id)
    {
        $this->ftpRepository->findById($id);
    }

    public function update($id)
    {
        $this->ftpRepository->update($id);
    }

    public function destroy($id)
    {
        $this->ftpRepository->delete($id);
    }

}