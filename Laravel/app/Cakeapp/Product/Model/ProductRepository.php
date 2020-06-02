<?php


namespace App\Cakeapp\Product\Model;

use App\Cakeapp\Common\Eloquent\Repository;
use App\Mail\UserVerified;
use Illuminate\Support\Facades\Mail;

class ProductRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        // TODO: Implement model() method.
        return Product::class;
    }

    public function handleCreate($request)
    {
        if(isset($request->product_image_name)){
            $image_name=$request->product_image_name->getClientOriginalName();
            $request->product_image_name->storeAs('images/product',$image_name);
        }
        $product= $this->create($request->all()+['image_name'=>$image_name]);
        return $product;
    }

    public function showData($id)
    {
        $product = $this -> findOrFail($id);
        return $product;
    }

    public function handleDelete($id)
    {
        $product = $this -> findOrFail($id);
        $product -> delete();
    }
}
