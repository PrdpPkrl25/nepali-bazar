<?php

namespace App\Http\Controllers\Web\Product;

use App\Cakeapp\Common\Events\VisitItem;
use App\Cakeapp\Product\Model\Category;
use App\Cakeapp\Product\Model\Feature;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Product\Model\ProductRepository;
use App\Cakeapp\User\Permission\CheckPermissionTrait;

use App\Cakeapp\Vendor\Model\Owner;
use App\Cakeapp\Vendor\Model\Shop;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this -> productRepository = $productRepository;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($categoryId)
    {

            $subCategoryId=Category::where('main_category_id','=',$categoryId)->orWhere('id',$categoryId)->pluck('id')->toArray();
            $products=Product::whereIn('category_id',$subCategoryId)->Paginate(12);
            return view('product.product_category',compact('products'));

    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
            $this->checkAllowedAccessForController('create-product');
            $categories=Category::all();
            $shops=Shop::where('owner_id',Auth::id())->get();
            return view('product.create_product',compact('categories','shops'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {

        $user=Auth::user();
        if($user->can('create-product')){
            $this-> productRepository -> handleCreate($request);
            return redirect()->route('home');
        }
        else{
            return redirect()->back() ->with('error','You have no permission for this page!');;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $product=$this->productRepository->getData($id);
        $shop_id=$product->shop_id;
        $shop=Shop::where('id',$shop_id)->first();
        $features=Feature::where('product_id',$product->id)->get();
        event(new VisitItem($product));

        return view('product.show_product',compact('shop','product','features'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $product_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($product_id)
    {
        $categories=Category::all();
        $shops=Shop::where('owner_id',Auth::id())->get();
        $product=Product::where('id',$product_id)->first();
        $features=Feature::where('product_id',$product->id)->get();
        return view('product.product_edit',compact('product','shops','categories','features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this-> productRepository->handleEdit($request,$id);
        return redirect()->route('products.listed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->handleDelete($id);
        return response()->json(null,204);
    }

    public function productsListed(){
        $shopIdArray=Shop::where('owner_id',Auth::id())->pluck('id');
        $products=Product::whereIn('shop_id',$shopIdArray)->orderBy('shop_id')->get();
        return view('product.products_listed',compact('products'));

    }


}
