<?php

namespace App\Service;

use App\Repositories\Banner\BannerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class BannerService
{
    protected $bannerRepository;
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function getAll()
    {
        return $this->bannerRepository->getAll();
    }

    public function getById($id)
    {
        return $this->bannerRepository->getById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->bannerRepository->update($request,$id);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'banner_image' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->bannerRepository->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->bannerRepository->delete($id);
    }
}
