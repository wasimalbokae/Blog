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
        return view("Category.create");
    }
    public function store(Request $request)
    {
        $this->authorize("is_admin",User::class);
        $request->validate(["word"=>"required|unique:tags|min:3|max:50"]);
        if(Category::create(["word"=>$request->word]))
        return redirect()->route('Category');
        return view("Category");
    }
    public function edit($id)
    {
        $this->authorize("is_admin",User::class);
        $Category=Category::find($id);
        if($Category)
        return view("Category.edit",compact("Category"));
        return redirect()->route('Category')->with('error', 'Not Found ID='.$id);
    }
    public function update(Request $request, $id)
    {
        $this->authorize("is_admin",User::class);
            $Category=Category::find($id);
            if($Category)
            {
                if($request->word!=$Category->word)
                {
                    $request->validate(["word"=>"required|unique:categories|min:3|max:50"]);
                    $Category->word=$request->word;
                    $Category->save();
                }
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
