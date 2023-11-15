<?php

namespace App\Service;

use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getAllbyCategroyType($category)
    {
        return $this->productRepository->getAllbyTypeCategory($category);
    }

    public function getDetailCategroyType($id,$category)
    {
        return $this->productRepository->getByIdTypeCategory($id,$category);
    }

    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function getBySlug($slug)
    {
        return $this->productRepository->getBySlug($slug);
    }

    public function relatedProduct($category)
    {
        return $this->productRepository->relatedProduct($category);
    }

    public function popularProduct()
    {
        return $this->productRepository->popularProduct();
    }

    public function popularProductHome()
    {
        return $this->productRepository->popularProductHome();
    }

    public function update(Request $request, $id)
    {
        return $this->productRepository->update($request,$id);
    }

    public function updateStock($qty, $id)
    {
        return $this->productRepository->updateStockCheckout($qty,$id);
    }

    public function addDomainCheckout(Request $request)
    {
        return $this->productRepository->addDomain($request);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'available_qty' => 'required ? 1 : 0',
            'weight' => 'required ? 1 : 0',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->productRepository->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
