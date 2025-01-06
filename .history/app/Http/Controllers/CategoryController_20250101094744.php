<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
class CategoryController extends Controller
{    use AuthorizesRequests;
    public function index()
    {
        $this->authorize("is_admin",User::class);
        $Categories =Category::all();
        if($Categories)
        return view("Categories.index",compact("Categories"));
        return redirect()->route('Category')->with('error', 'No Data Found');
    }
    public function create()
    {
        $this->authorize("is_admin",User::class);
        return view("Categories.create");
    }
    public function store(Request $request)
    {
        $this->authorize("is_admin",User::class);
        $request->validate([
            "title"=>"required|unique:categories|min:3|max:50",
            "description"=>"min:3|max:100",
            "image"=>"mimes:jpeg,jpg,png,gif|max:10000",
        ]);
        $image=$request->image;
        $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
        $image->move(public_path("/images"),$imgName);
        Category::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "image"=>json_encode( $imgName)
        ]);
        return redirect()->route('Category');
    }
    public function edit($id)
    {
        $this->authorize("is_admin",User::class);
        $Category=Category::find($id);
        if($Category)
        return view("Categories.edit",compact("Category"));
        return redirect()->route('Category')->with('error', 'Not Found ID='.$id);
    }
    public function update(Request $request, $id)
    {
        $this->authorize("is_admin",User::class);
            $Category=Category::find($id);
            if($Category)
            {
                $request->validate([
                    "title"=>"different:title|unique:categories|min:3|max:50",
                    "description"=>"different:description|min:3|max:100",
                    "image"=>"different:image|mimes:jpeg,jpg,png,gif|max:10000",
                ]);
                if($request->hasFile("image"))
                {
                    $img=json_decode($Category->image);
                    $image_path = public_path("/images").$img;
                    if(file_exists($image_path))
                    unlink($image_path);
                    $image=$request->file("image");
                    $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                    $image->move(public_path("/images"),$imgName);
                    $Category->image=json_encode( $imgName);
                }
                    if(!empty($request->title))
                        $Category->title=$request->title;
                    if(!empty($request->description))
                        $Category->description=$request->description;
                    $Category->save();
                    return redirect()->route('Category');
            }
            return redirect()->route('Category')->with('error', 'Not Found ID='.$id);
    }
    public function destroy($id)
    {
        $this->authorize("is_admin",User::class);
            $Category = Category::find($id);
            if($Category)
            {
                $Category->delete();
                return redirect()->route('Category');
            }
            return redirect()->route('Category')->with('error', 'Not Found ID='.$id);
    }

}
