<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\feedback;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //category
    public function categoryList()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function categoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,webp,png,jpg', // Ensure each file is an image
        ]);

        // Create the category
        $category = new Category();
        $category->name= $validated['name'];

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public'); // Save the image path to the database
        }
        $category->save();
        return redirect()->route('categoryList')->with('success', 'Category created successfully.');
    }


    public function categoryCreate()
    {
        return view('admin.category.create');
    }

    public function categoryEdit(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,webp,png,jpg',
        ]);

        // Update the category name
        $category->name = $validated['name'];
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
    
            // Store the new image
            $category->image = $request->file('image')->store('categories', 'public');
        }
        
        $category->save();

        return redirect()->route('categoryList')->with('success', 'Category updated successfully.');
    }


    public function categoryDestory($id)
    {
        $category = Category::where('id', $id)->first();
        if ($category->images) {
            $oldImages = json_decode($category->images, true);
            foreach ($oldImages as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $category->delete();
        return back()->with('success', 'Category destoryed successfully');
    }

    public function subcategoryList()
    {
        $subcategory = SubCategory::all();
        return view('admin.subcategory.index', compact('subcategory'));
    }

    public function subcategoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,webp,png,jpg',
        ]);

        $subcategory =new SubCategory();
        $subcategory->name = $validated['name'];
        $subcategory->category_id = $validated['category_id'];
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('subcategories', 'public'); // Store image in 'public/subcategories'
            $subcategory->image = $path; // Save the image path to the database
        }
        $subcategory->save();
    
        return redirect()->route('subcategoryList')->with('success', 'SubCategory created successfully.', compact('subcategory'));
    }

    public function subcategoryCreate()
    {
        $category = Category::get();
        return view('admin.subcategory.create',compact('category'));
    }

    public function subcategoryEdit(Request $request, $id)
    {
        $categories = Category::get();
        $subcategory = SubCategory::where('id', $id)->first();
        return view('admin.subCategory.edit', compact('subcategory','categories'));
    }

    public function subcategoryUpdate(Request $request, $id)
{
    $subcategory = SubCategory::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,webp,png,jpg',
    ]);
    $subcategory->name = $validated['name'];
    $subcategory->category_id = $validated['category_id'];

    if ($request->hasFile('image')) {
        // Delete the old image
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }

        // Store the new image
        $subcategory->image = $request->file('image')->store('subcategories', 'public');
    }

    $subcategory->save();

    return redirect()->route('subcategoryList')->with('success', 'SubCategory updated successfully.');
}

    public function subcategoryDestory($id)
    {
        $subcategory=SubCategory::where('id', $id)->first();
        if ($subcategory->images) {
            $oldImages = json_decode($subcategory->images, true);
            foreach ($oldImages as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $subcategory->delete();
        return back()->with('success', 'SubCategory destoryed successfully');
    }

    //product
    public function index()
    {
        $categories = Category::with('subCategories')->get();
        $product = Product::with('subcategories')->get();
        return view('admin.product.index', compact('categories', 'product'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $subcategories = collect();

        return view('admin.product.create', compact('categories', 'subcategories'));
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'sometimes|exists:sub_categories,id',
            'stock' => 'required|integer',
            'carModel' => 'required|string|max:255',
            'price' => 'required',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'carBrand' => 'required|string',
            'madeIn' => 'required|string',
        ]);

        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            $imagePaths[] = $path;
        }

        Product::create([
            'category_id' => $validated['category_id'],
            'sub_category_id' => $validated['sub_category_id'],
            'stock' => $validated['stock'],
            'carModel' => $validated['carModel'],
            'price' => $validated['price'],
            'images' => $imagePaths,
            'carBrand' => $validated['carBrand'],
            'madeIn' => $validated['madeIn']
        ]);

        return redirect()->route('productList')->with('success', 'Product created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $categories = Category::all();
        $subcategories = collect();
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => [
                'nullable',
                Rule::exists('sub_categories', 'id')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                }),
            ],
            'stock' => 'required|integer',
            'carModel' => 'required|string|max:255',
            'price' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,webp,png,jpg,svg',
            'carBrand' => 'required|string|max:255',
            'madeIn' => 'required|string|max:255',
        ]);

        // Handle images upload if any
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($product->images as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('products', 'public');
            }
            $validated['images'] = $images;
        } else {
            $validated['images'] = $product->images;
        }

        $product->update($validated);

        return redirect()->route('productList')->with('success', 'Product updated successfully');
    }


    // Delete a product
    public function productDelete($id)
    {
        $product = Product::find($id);

        if ($product) {
            foreach ($product->images as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $product->delete();

            return back()->with('success', 'Product deleted successfully');
        }

        return back()->with('error', 'Product not found');
    }

    //user
    public function UserProduct()
    {
        $products = Product::with('subCategories')->get();
        $categories = Category::with('subCategories')->get();
        return view('user.product', compact('products', 'categories'));
    }

    public function UserProductDetail($id)
    {
        $products = Product::where('id', $id)->first();
        return view('user.productDetail', compact('products'));
    }

    public function about()
    {
        $products = Product::all();
        return view('user.about', compact('products'));
    }

    public function contact()
    {
        $products = Product::all();
        return view('user.contact', compact('products'));
    }


    public function subcategoryShow(Request $request, $id)
    {
        $subCategories = SubCategory::with('products', 'category')->where('category_id', $id)->get();
        return view('user.subCategoryShow', compact('subCategories'));
    }
    public function subcategoryAllShow(Request $request, $id)
    {
        $subCategories = SubCategory::with('products', 'category')->where('category_id', $id)->get();
        $products = Product::where('sub_category_id', $id)->get();
        $subCat = $products->where('sub_categroy_id',$id)->first();
        $subCatName = SubCategory::where('id',$subCat)->first();
        return view('user.subCategoryAllShow', compact('subCategories', 'products','subCat','subCatName'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'subcategory'])->findOrFail($id);
        return response()->json($product);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('carModel', 'LIKE', '%' . $search . '%')
            ->orWhere('price', 'LIKE', '%' . $search . '%')
            ->orWhere('carBrand', 'LIKE', '%' . $search . '%')
            ->orWhere('madeIn', 'LIKE', '%' . $search . '%')
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('subcategories', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->get();
        return view('user.search', compact('products'));
    }
    public function searchCat(Request $request)
    {
        $search = $request->input('searchCat');
        $searchId = $request->input('subCat');  
        $products = Product::where('sub_category_id', $searchId)
            ->where(function ($query) use ($search) {
                $query->where('carModel', 'LIKE', '%' . $search . '%')
                    ->orWhere('price', 'LIKE', '%' . $search . '%')
                    ->orWhere('carBrand', 'LIKE', '%' . $search . '%')
                    ->orWhere('madeIn', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('subcategories', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    });
            })
            ->get();
        return view('user.search', compact('products'));
    }

    public function feedback(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rate' => 'required|numeric|min:1|max:5',
            'feedback' => 'nullable|string',
        ]);

        $feedback = Feedback::create($validatedData);

        return response()->json([
            'success' => true,
            'feedback' => $feedback
        ]);
    }
    
}
