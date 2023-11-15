<?php

namespace App\Service;

use App\Repositories\Articles\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class ArticleService
{
    protected $articleRepo;
    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }

    public function getAll()
    {
        return $this->articleRepo->getAll();
    }

    public function articlePublish()
    {
        return $this->articleRepo->getArticlePublish();
    }

    public function getById($id)
    {
        return $this->articleRepo->getById($id);
    }

    public function getBySlug($slug)
    {
        return $this->articleRepo->getBySlug($slug);
    }

    public function popularByView()
    {
        return $this->articleRepo->popularByView();
    }

    public function relatedPost($category)
    {
        return $this->articleRepo->relateArticle($category);
    }

    public function update(Request $request, $id)
    {
        return $this->articleRepo->update($request,$id);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titles' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->articleRepo->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->articleRepo->delete($id);
    }
}
