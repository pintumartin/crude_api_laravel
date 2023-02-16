<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Blog;
use App\Http\Resources\Blog as BlogResource;
   
class BlogController extends BaseController
{
    public function index()
    {
        $blogs = Blog::all();
        return $this->sendResponse(BlogResource::collection($blogs), 'Posts fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $blog = Blog::create($input);
        return $this->sendResponse(new BlogResource($blog), 'Post created.');
    }
   
    public function show($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new BlogResource($blog), 'Post fetched.');
    }
    
    public function update(Request $request,$id)
    {   $blog = Blog::find($id);
        $input = $request->all();
        if(is_null($blog)){
            $blog = Blog::create($input);
            return $this->sendResponse(new BlogResource($blog), 'Post created.');
        } 
        $blog->title = $input['title'];
        $blog->description = $input['description'];
        $blog->save();
        return $this->sendResponse(new BlogResource($blog), 'Post updated.');
    }
   
    public function destroy($id)
    {   $blog = Blog::find($id);
        $blog->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}