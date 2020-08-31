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
        $image_name=null;
        if(isset($request->product_image_name)){
            $image_name=$request->product_image_name->getClientOriginalName();
            $request->product_image_name->storeAs('images/product',$image_name);
        }
        $product= $this->create(['product_name'=>$request->product_name,'category_id'=>$request->category_id,'base_quantity'=>$request->base_quantity,'shop_id'=>$request->shop_id,'measure_unit'=>$request->measure_unit,'price'=>$request->price,'image_name'=>$image_name]);

        $no_of_features=count($request->all()['name']);
        for($i=0;$i<$no_of_features;$i++) {
            Feature::create(['product_id' => $product->id, 'name' => $request->all()['name'][$i], 'description' => $request->all()['description'][$i]]);
        }
    }


    public function getData($id)
    {
        return $this -> findOrFail($id);
    }

    public function handleEdit($request,$id)
    {
        $image_name=null;
        if(isset($request->product_image_name)){
            $image_name=$request->product_image_name->getClientOriginalName();
            $request->product_image_name->storeAs('images/product',$image_name);
        }

        Product::where('id',$id)->update(['product_name'=>$request->product_name,'category_id'=>$request->category_id,'base_quantity'=>$request->base_quantity,'shop_id'=>$request->shop_id,'measure_unit'=>$request->measure_unit,'price'=>$request->price,'image_name'=>$image_name]);
        Feature::where('product_id',$id)->delete();
        $no_of_features=count($request->all()['name']);
        for($i=0;$i<$no_of_features;$i++) {
            Feature::create(['product_id' => $id, 'name' => $request->all()['name'][$i], 'description' => $request->all()['description'][$i]]);
        }
    }

    public function handleDelete($id)
    {
        $product = $this -> findOrFail($id);
        $product -> delete();
    }
}
