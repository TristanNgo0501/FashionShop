<?php
namespace App\Http\Controllers\Backend;
use App\Models\BlogCommentModel;
use App\Models\BlogModel;
use App\Models\CustomerCommentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use function PHPUnit\Framework\isEmpty;

class BlogController extends Controller
{
    public function blogList(Request $request)
    {
       $ds= BlogModel::where("Is_delete",0)->orderBy('created_at', 'DESC')->get();


        
        return view("admin.blog.index",compact("ds"));
    }
    public function create(Request $request)
    {
       
        return view("admin.blog.create");
    }

    public function Postcreate(Request $request)
    {

        $data = $request->all();

        $blog = new BlogModel();

        $blog["Name"] = $data["exampleInputBlogName"];
        $blog["Description"] = $data["exampleInputDescription"];
        $blog["Content"] = $data["exampleInputContent"];
        $blog["Is_delete"] = 0;
        $blog["Is_active"] =1;
        $blog->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $imageName1 = "Blog".$blog["Id"]."jpg";
            $imageName = "images/imageblog/$imageName1";

            $file->move("images/imageblog/", $imageName1);
        } else {
            $imageName = "";
        }

        BlogModel::where("Id",$blog["Id"])->update(["Thumbnail"=>$imageName]);
       
        return  redirect("/admin/blog/bloglist");
    }
    
    public function edit(Request $request)
    {
        $data = $request->all();
        $id =$request["id"];
        $ds= BlogModel::where("Id",$id)->get()->first();

        return view("admin.blog.edit",compact("ds"));
    }

    public function Postedit(Request $request)
    {

        $data = $request->all();

        $blog = new BlogModel();

        $blog["Name"] = $data["exampleInputBlogName"];
        $blog["Description"] = $data["exampleInputDescription"];
        $blog["Content"] = $data["exampleInputContent"];
        $blog["Id"]  = $data["id"];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $imageName1 = "Blog".$blog["Id"]."jpg";
            $imageName = "images/imageblog/$imageName1";

            $file->move("images/imageblog/", $imageName1);
        } else {
            $imageName1 = "Blog".$blog["Id"]."jpg";
            $imageName = "images/imageblog/$imageName1";
        }

        BlogModel::where("Id",$blog["Id"])->update(["Thumbnail"=>$imageName, 
                                                    "Name"=> $blog["Name"], 
                                                    "Description"=>$blog["Description"],
                                                     "Content"=>$blog["Content"]
                                                    ]);
       
        return  redirect("/admin/blog/bloglist");
    }
    
    public function setstatus(Request $request)
    {
        $data = $request->all();
        $id =$request["id"];
        $ds= BlogModel::where("Id",$id)->get()->first();

        if($ds["Is_active"]==true){
            $ds["Is_active"]=false;
        }else{
            $ds["Is_active"]=true;
        }

        BlogModel::where("Id",$ds["Id"])->update(["Is_active"=>$ds["Is_active"]]);

        return  redirect("/admin/blog/bloglist");
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $id =$request["id"];
        $ds= BlogModel::where("Id",$id)->get()->first();

        $ds["Is_delete"]=true;

        BlogModel::where("Id",$ds["Id"])->update(["Is_delete"=>$ds["Is_delete"]]);

        return  redirect("/admin/blog/bloglist");
    }

    public function commentlist(Request $request)
    {
        $data = $request->all();

     

        if($data["id"]!="" || $data["id"]!=null ){
            $id =$request["id"];
            $ds= BlogCommentModel::where("Id_Blog",$id)->where("Is_delete",0)->orderBy('created_at', 'DESC')->get();
        }else{
            $ds= BlogCommentModel::orderBy('created_at', 'DESC')->where("Is_delete",0)->get(); 
        }

       for ($i=0; $i <count($ds) ; $i++) { 
 
            // $ds[$i]["Name"] = CustomerCommentModel::where("customer_id",)->select("first_name")->get()->first()["first_name"] ." " .CustomerCommentModel::where("customer_id",$ds[$i]["Customer_id"])->select("last_name")->get()->first()["last_name"] ;
            $ds[$i]["NameBlog"] =BlogModel::where('Id',$ds[$i]["Id_Blog"] )->select("Name")->get()->first()["Name"];
            $ds[$i]["Name"]= CustomerCommentModel::where("customer_id",$ds[$i]["Customer_id"])->select("first_name")->get()->first()["first_name"] ." ". CustomerCommentModel::where("customer_id",$ds[$i]["Customer_id"])->select("last_name")->get()->first()["last_name"];
      
        }

    
        return  view("admin.blog.commentlist", compact("ds"));
    }

    public function deletecoment(Request $request)
    {
        $data = $request->all();
        $id = $request["id"];

        BlogCommentModel::where("Id",$id)->update(["Is_delete"=>1]);
        return redirect()->back();
    }

    public function deletecomentuser(Request $request)
    {
        $data = $request->all();
        $id = $request["id"];

        BlogCommentModel::where("Id",$id)->update(["Is_delete"=>1]);
        return redirect()->back();
    }
    
    public function Homeblog(Request $request)
    {
       $ds= BlogModel::where("Is_delete",0)->where("Is_active",1)->orderBy('created_at', 'DESC')->get();

            for ($i=0; $i < count($ds); $i++) { 
                
                $ds[$i]["Thumbnail"]=asset("/".$ds[$i]["Thumbnail"]);
                $ds[$i]["url"]=asset("blog/detail?id=".$ds[$i]["Id"]);
                $ds[$i]["comment"]= count(BlogCommentModel::where("Is_delete",0)->where("Id_Blog",$ds[$i]["Id"])->get());
            }
        
        return view("admin.blog.homeblog",compact("ds"));
    }

    public function Homeblogdetal(Request $request)
    {
      $id=  $request->all()["id"];
      $ds = BlogModel::where("Id",$id)->get()->first();
      $ds["url"]=  asset("/blog/view");


        $ds1= BlogCommentModel::where("Id_Blog",$id)->where("Is_delete",0)->orderBy('created_at', 'DESC')->get();
        for ($i=0; $i <count($ds1) ; $i++) { 
 
            // $ds[$i]["Name"] = CustomerCommentModel::where("customer_id",)->select("first_name")->get()->first()["first_name"] ." " .CustomerCommentModel::where("customer_id",$ds[$i]["Customer_id"])->select("last_name")->get()->first()["last_name"] ;
            $ds1[$i]["NameBlog"] =BlogModel::where('Id',$ds1[$i]["Id_Blog"] )->select("Name")->get()->first()["Name"];
            $ds1[$i]["Name"]= CustomerCommentModel::where("customer_id",$ds1[$i]["Customer_id"])->select("first_name")->get()->first()["first_name"] ." ". CustomerCommentModel::where("customer_id",$ds1[$i]["Customer_id"])->select("last_name")->get()->first()["last_name"];
      
        }
    
        
        return view("admin.blog.homeblogdetail",compact("ds","ds1"));
    }

    public function Homeblogview(Request $request)
    {
      $id=  $request->all()["id"];
      $View = BlogModel::where("Id",$id)->select("View")->get()->first()["View"];

      BlogModel::where("Id",$id)->update(["View"=>$View+1]);
        
        return true;
    }


    public function HomeblogAddcomment(Request $request)
    {
        $id_user= 1;

      $id=  $request->all()["id"];
      $text=  $request->all()["comment-text"];

      $comment=new  BlogCommentModel();
      $comment["Id_Blog"]= $id;
      $comment["Customer_id"]= $id_user;
      $comment["Is_delete"]= 0;
      $comment["Content"]=$text;

      $comment->save();

        
      return redirect()->back();
    
    }
    
    
    
}
