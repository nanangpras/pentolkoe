<?php

namespace App\Service;

use App\Repositories\CompanyProfile\CompanyProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class CompanyProfileService
{
    protected $compro;
    public function __construct(CompanyProfileRepository $compro)
    {
        $this->compro = $compro;
    }

    public function getAll()
    {
        return $this->compro->getAll();
    }

    public function getById($id)
    {
        return $this->compro->getById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->compro->update($request,$id);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            // 'tagline' => 'required',
            // 'description' => 'required',
            // 'address' => 'required',
            // 'phone' => 'required',
            // 'email' => 'required',
            'logo' => 'max:2094',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->compro->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->compro->delete($id);
    }
}
