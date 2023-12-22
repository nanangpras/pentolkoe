<?php

namespace App\Repositories\Product;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Repositories\Product\InterfaceProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProductRepository implements InterfaceProduct
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
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
        return $this->product->with(['category','productImages'])->where(function($q){
            $q->where('category_id','!=',1000);
            // $q->where('weight','=',0);
        })->get();
    }

    // ambil semua produk berdasarkan tipe kategori
    public function getAllbyTypeCategory($category)
    {
        return $this->product->with(['category','productImages'])->whereHas('category',function($q) use($category) {
            $q->where('type',$category);
        })->get();
    }

    // detail produk sesuai tipe kategori
    public function getByIdTypeCategory($id,$category)
    {
        return $this->product->with(['category','productImages','chapters','chapters.lessons'])->whereHas('category',function($q) use($category) {
            $q->where('type',$category);
        })->where('id',$id)->first();
    }

    public function getById($id)
    {
        return $this->product->where('id',$id)->with('productImages')->first();
    }

    public function getBySlug($slug)
    {
        return $this->product->with(['category','productImages'])->where('slug',$slug)->firstOrFail();
    }

    public function relatedProduct($category)
    {
        return $this->product->where('category_id',$category)->take(6)->get();
    }

    public function popularProduct()
    {
        // $today  = Carbon::now()->format('Y-m-d');
        $popularProducts = $this->product->withCount('transactionDetails')->orderBy('transaction_details_count','desc')->take(5)->get();
        return $popularProducts;
    }

    public function popularProductHome()
    {
        // $today  = Carbon::now()->format('Y-m-d');
        $popularProductHome = $this->product->withCount('transactionDetails')->orderBy('transaction_details_count','desc')->take(3)->get();
        return $popularProductHome;
    }

    public function addDomain(Request $request)
    {
        $domain = new $this->product;
        $domain->title = $request->title_domain;
        $domain->category_id = 1000;
        $domain->available_qty = $request->qty;
        $domain->price = 180000;
        $domain->description = 'domain '.$request->title_domain;
        $domain->weight = 0;
        $domain->link = $request->title_domain;
        $domain->slug = Str::slug($request->title_domain);
        $domain->save();
        return $domain->fresh();
    }

    public function updateStockCheckout($qty, $id)
    {
        $product = $this->product->find($id);
        $product->available_qty = $product->available_qty - $qty;
        $product->save();
        return $product->fresh();
    }

    public function save(Request $request)
    {

        $storage="storage/product/image_description";
        $dom=new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->description,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
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

        $storage="storage/product/image_description";
        $short_description=new \DOMDocument();
        libxml_use_internal_errors(true);
        $short_description->loadHTML($request->short_description,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $short_description_images=$short_description->getElementsByTagName('img');
        foreach($short_description_images as $img){
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

        $product = Product::create([
            'title'         => $request->title,
            'category_id'   => $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'available_qty' => $request->available_qty ?? 1,
            'price'         => $request->price,
            'price_coret'   => $request->price_coret,
            'description'   => $dom->saveHTML(),
            'short_description' => $short_description->saveHTML(),
            'weight'        => $request->weight ?? 1,
            'link'          => $request->link,
            'attachment'    => $this->uploadImages($request->attachment,'image/attachment'),
            'attachment_link'=> $request->attachment_link,
            'slug'          => Str::slug($request->title),
            'flags'         => $request->flags,
        ]);

        $file_img = $request->hasFile('images');
        if ($file_img && is_array($file_img)) {
            for ($i=0; $i < count($file_img) ; $i++) {
                $product_images             = new ProductImage();
                $product_images->product_id = $product->id;
                $product_images->image      = $this->uploadImages($file_img[$i],'image/product_imagess');
                $product_images->save();
            }
            $product_images->save();
        }

        return $product->fresh();
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();
    }

    public function update(Request $request, $id)
    {
        // $product = $this->product->find($id);

        $storage="storage/product/image_description";
        $dom=new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->description,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
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
        $product = Product::where('id',$id)->update([
            'title'         => $request->title,
            'category_id'   => $request->category_id,
            'available_qty' => $request->available_qty,
            'price'         => $request->price,
            'description'   => $dom->saveHTML(),
            'weight'        => $request->weight,
            'link'          => $request->link,
            'slug'          => Str::slug($request->title),
            'flags'         => $request->flags,
        ]);
        // $product->title = $request->title;
        // $product->category_id = $request->category_id;
        // $product->available_qty = $request->available_qty;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->weight = $request->weight;
        // $product->slug = Str::slug($request->title);
        // $product->save();

        $file = $request->hasFile('images');
        if ($file && is_array($file)) {
            for ($i=0; $i < count($file) ; $i++) {
                $product_images = ProductImage::whereIn('product_id', $id)->update(['image' => $this->uploadImages($file[$i],'image/product_imagess')]);
                $product_images->save();
            }
            $product_images->save();
        }
        return $product->fresh();
    }
}
