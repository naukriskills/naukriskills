<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:category-create|category-edit|category-delete|category-publish', ['only' => ['index','store']]);
        //  $this->middleware('permission:category-create', ['only' => ['store']]);
        //  $this->middleware('permission:category-edit', ['only' => ['edit','update','grant','grantStore']]);
        //  $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        //  $this->middleware('permission:category-publish', ['only' => ['status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::orderBy('created_at', 'DESC')->Where('name', 'LIKE', "%{$request->search}%")
                ->orWhere('code', 'LIKE', "%{$request->search}%")->paginate(10);
            return view('admin.category.dataTable', compact('data'))->render();
        } else {
            $data = Category::orderBy('created_at', 'DESC')->paginate(10);
            return view('admin.category.index', compact('data'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'code' => 'required|unique:categories,code|max:255',
            'name' => 'required|max:255'
        ], [
            'code.required' => 'A category code is required',
            'name.required' => 'A category name is required',
            'code.unique' => 'This category code already exist. Please enter another code'
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.category')->withErrors($validator)->withInput();
        }
        $cate = new Category();

        $cate->code = $data['code'];
        $cate->name = $data['name'];
        $cate->userid = Auth::user()->id;

        if ($cate->save()) {
            return redirect()->route('admin.category')->with(['status' => 'success', 'message' => 'Insert Operation Successfully Done.']);
        } else {
            return redirect()->route('admin.category')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {        
        $row = Category::where('id', $request->id)->first();      
        return '<div class="modal-header">
            <h4 class="modal-title">Update Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="' . route("admin.category.update") . '" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="id" value="' . $row->id . '" />
                <div class="card-body">
              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" value="'.$row->name.'">
              </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Records</button>
                </div>
            </form>
        </div>';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();

        $cate = Category::find($data['id']);

        $cate->name = $data['name'];
        $cate->userid = Auth::user()->id;


        if ($cate->save()) {
            return redirect()->route('admin.category')->with(['status' => 'success', 'message' => 'Update Operation Successfully Done.']);
        } else {
            return redirect()->route('admin.category')->with(['status' => 'error', 'message' => 'Something Wrong!. Please Try Again']);
        }
    }

     /**  Change status of every category 
      * */
    public function status(Request $request)
    {       
        $cate = Category::find($request->id);
        $cate->status = $request->status;
        $cate->userid = Auth::user()->id;
        if ($cate->save()) {
            $data = [
                'status' => 'success',
            ];
        } else {
            $data = [
                'status' => 'error',
            ];
        }
        return response()->json($data);
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $res = Category::where('id', $request->id)->delete();
        if ($res) {
            // Subcategory::where('cate_code', Category::find($request->id)->code)->delete();
            // Complaint::where('cate_code', Category::find($request->id)->code)->delete();
            $data = [
                'status' => 'success',
                'message' => 'Your Record has been deleted'
            ];
        } else {
            $data = [
                'status' => 'error',
                'message' => 'Something Wrong.!'
            ];
        }
        return response()->json($data);
    }
}
