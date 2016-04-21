<?php namespace App\Http\Controllers\Ftp;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerInterface;
use App\Repositiories\src\Providers\Ftp\FtpRepository;

class FtpController extends Controller implements ControllerInterface
{
    /**
     * @var FtpRepository
     */
    private $FtpRepository;

    /**
     * FtpController constructor.
     * @param FtpRepository $ftpRepository
     */
    public function __construct(FtpRepository $ftpRepository)
    {
        $this->FtpRepository = $ftpRepository;
    }

    /**
     * @param array $data
     * Data = list of data you wil store
     * @return mixed|void
     */
    public function store(array $data)
    {
        $this->FtpRepository->save($data);
    }

    /**
     * @param String $id
     * id = name file you look for
     * @return mixed|void
     */
    public function show($id)
    {
        $this->FtpRepository->findById($id);
    }

    /**
     * @param String $id
     * id = name update file
     * @return mixed|void
     */
    public function update($id)
    {
        $this->FtpRepository->update($id);
    }

    /**
     * @param String $id
     * id = name delete file
     * @return mixed|void
     */
    public function destroy($id)
    {
        $this->FtpRepository->delete($id);
    }

}