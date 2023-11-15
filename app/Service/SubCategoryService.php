<?php

namespace App\Service;

use App\Repositories\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class SubCategoryService
{
    protected $subCategoryRepository;
    public function __construct(SubcategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function getAll()
    {
        return $this->subCategoryRepository->getAll();
    }

    public function getsubCategory($type,$id)
    {
        return $this->subCategoryRepository->getSubCategory($type,$id);
    }

    public function getById($id)
    {
        return $this->subCategoryRepository->getById($id);
    }

    public function getCategoryId($id)
    {
        return $this->subCategoryRepository->getCategoryId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->subCategoryRepository->update($request,$id);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $save = $this->subCategoryRepository->save($request);
        return $save;

    }

    public function delete($id)
    {
        return $this->subCategoryRepository->delete($id);
    }
}
