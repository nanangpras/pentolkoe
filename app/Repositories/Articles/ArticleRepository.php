<?php

namespace App\Repositories\Articles;

use App\Models\Article;
use App\Models\Banner;
use App\Repositories\Articles\InterfaceArticle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Path\To\DOMDocument;

class ArticleRepository implements InterfaceArticle
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    private function base()
    {
        $base_path = '';
    }

    protected function uploadImages($file, $path)
    {
        $date = Carbon::now();
        $filePath = $path . "/$date->year";
        $filename = $this->base() . $date->timestamp . '_' . $file->getClientOriginalName();
        $dd = $file->storeAs(
            $filePath, $filename, 'public'
        );
        $url = Storage::disk('public')->url($dd);
        return $url;
    }

    public function getAll()
    {
        return $this->article->get();
    }

    public function getArticlePublish()
    {
        return $this->article->where('status', 1)->get();
    }

    public function getById($id)
    {
        return $this->article->where('id',$id)->first();
    }

    public function getBySlug($slug)
    {
        return $this->article->with('author')->where('slug',$slug)->first();
    }

    public function popularByView()
    {
        return $this->article->orderBy('view','desc')->take(4)->get();
    }

    public function relateArticle($category)
    {
        return $this->article->where('category_id',$category)->paginate(2);
    }

    public function save(Request $request)
    {
        $storage="storage/artikel/image";
        $dom=new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->body,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images=$dom->getElementsByTagName('img');
        foreach($images as $img){
            $src=$img->getAttribute('src');
            if(preg_match('/data:image/',$src)){
                preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
                $mimetype=$groups['mime'];
                $fileNameContent=uniqid();
                $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                if (!is_dir($storage)) {
                    mkdir($storage, 0775, true);
                }
                $filepath=("$storage/$fileNameContentRand.$mimetype");
                $image=Image::make($src)
                    ->resize(1200,1200)
                    ->encode($mimetype,100)
                    ->save(public_path($filepath));
                $new_src=asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src',$new_src);
                $img->setAttribute('class','img-responsive');
            }
        }

        $file_thumbnail         = $request->file('thumbnail');
        $file_image             = $request->file('image');
        $article = Article::create([
            'titles'        => $request->titles,
            'body'          => $dom->saveHTML(),
            'category_id'   => $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'status'        => $request->status ?? 1,
            'user_id'       => Auth::user()->id,
            'slug'          => Str::slug($request->titles),
            'tags'          => $request->tags,
            'view'          => 0,
            'thumbnail' =>  $this->uploadImages($file_thumbnail,'image/article/thumbanail'),
            'image' => $this->uploadImages($file_image,'image/article')

        ]);

        return $article->fresh();
    }

    public function delete($id)
    {
        $article = $this->article->find($id);
        $article->delete();
    }

    public function update(Request $request, $id)
    {
        $storage="storage/artikel/image";
        $dom=new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->body,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images=$dom->getElementsByTagName('img');
        foreach($images as $img){
            $src=$img->getAttribute('src');
            if(preg_match('/data:image/',$src)){
                preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
                $mimetype=$groups['mime'];
                $fileNameContent=uniqid();
                $fileNameContentRand=substr(md5($fileNameContent),6,6).'_'.time();
                if (!is_dir($storage)) {
                    mkdir($storage, 0775, true);
                }
                $filepath=("$storage/$fileNameContentRand.$mimetype");
                $image=Image::make($src)
                    ->resize(1200,1200)
                    ->encode($mimetype,100)
                    ->save(public_path($filepath));
                $new_src=asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src',$new_src);
                $img->setAttribute('class','img-responsive');
            }
        }

        $file_thumbnail         = $request->hasFile('thumbnailedit');
        $file_image             = $request->hasFile('imageedit');
        $article = $this->article->find($id);
        if ($article) {
            if ($file_image) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $article->update([
                    'image'         => $this->uploadImages($file_image,'image/article')
                ]);
            }

            if ($file_thumbnail) {
                if ($request->oldThumbnail) {
                    Storage::delete($request->oldThumbnail);
                }
                $article->update([
                    'thumbnail'     =>  $this->uploadImages($file_thumbnail,'image/article/thumbanail'),
                ]);
            }

            $article->update([
                'titles'        => $request->titles,
                'body'          => $dom->saveHTML(),
                'category_id'   => $request->category_id,
                'status'        => $request->status ?? 1,
                'user_id'       => Auth::user()->id,
                'slug'          => Str::slug($request->titles),
                'tags'          => $request->tags,
                'view'          => 0,
            ]);

        }
        // $update = Article::where('id',$id)->update([
        //     'titles'        => $request->titles,
        //     'body'          => $dom->saveHTML(),
        //     'category_id'   => $request->category_id,
        //     'status'        => $request->status ?? 1,
        //     'user_id'       => Auth::user()->id,
        //     'slug'          => Str::slug($request->titles),
        //     'tags'          => $request->tags,
        //     'view'          => 0,
        // ]);


        // $update = $this->banner->find($id);
        // $update->name = $request->name;
        // $update->description = $request->description;
        // $update->slug = Str::slug($request->name);
        // $update->status = $request->status;
        // $update->link = $request->link;
        // $update->status = $request->status;
        // if ($request->file('banner_image')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //         // $image_path = $request->oldImage;
        //         // unlink($image_path);
        //     }
        //     $update->banner_image = $this->uploadImages($request->file('image'),'image/category');
        // }
        // $update->save();
        return $article->fresh();
    }
}
