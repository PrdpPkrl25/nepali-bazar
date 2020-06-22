<?php

namespace App\Http\Controllers\Web\Product;

use App\Cakeapp\Common\Events\VisitProduct;
use App\Cakeapp\Product\Model\Category;
use App\Cakeapp\Product\Model\Product;
use App\Cakeapp\Product\Model\ProductRepository;
use App\Cakeapp\User\Permission\CheckPermissionTrait;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductPost;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
            $this->checkAllowedAccessForController('create-product');
            $categories=Category::all();
            return view('product.create_product',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreProductPost $request)
    {
        $user=Auth::user();
        if($user->can('create-product')){
            $product = $this-> productRepository -> handleCreate($request);
            return view('welcome');
        }
        else{
            return redirect()->back() ->with('error','You have no permission for this page!');;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $product=Product::where('id',$id)->first();

        event(new VisitProduct($product));

        return view('product.show_product',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $product = $this-> productRepository->showData($id);
        $product->update($requestData);
        return response()->json($product,200);
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
}
