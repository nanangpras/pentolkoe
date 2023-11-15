<?php

namespace App\Service;

use App\Repositories\CompanyProfile\ClientCompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class ClientCompanyService
{
    protected $clientCompany;
    public function __construct(ClientCompanyRepository $clientCompany)
    {
        $this->clientCompany = $clientCompany;
    }

    public function getAll()
    {
        return $this->clientCompany->getAll();
    }

    public function getById($id)
    {
        return $this->clientCompany->getById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->clientCompany->update($request,$id);
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
            'logo' => 'required|max:2094',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->clientCompany->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->clientCompany->delete($id);
    }
}
