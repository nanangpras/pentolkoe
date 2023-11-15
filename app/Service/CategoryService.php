<?php

namespace App\Service;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class CategoryService
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryByType($type)
    {
        return $this->categoryRepository->getCategoryType($type);
    }

    public function getCategoryProduct()
    {
        return $this->categoryRepository->getCategoryProduct();
    }

    public function getCategoryArticle()
    {
        return $this->categoryRepository->getCategoryArticle();
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function update(Request $request, $id)
    {
        return $this->categoryRepository->update($request,$id);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->categoryRepository->save($request);

        return $result;
    }

    public function saveSub(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $save = $this->categoryRepository->saveSubCategory($request);
        return $save;

    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
