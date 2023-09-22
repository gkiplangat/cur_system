<?php

namespace MyJesus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use MyJesus\Models\Blog;


class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
	public function view_category_blog($category,$id,$slug)
	{
	  $blogData['post'] = Blog::catpostData($id); 
	  $blog['popular'] = Blog::getpopularData();
	  	  
	  $catData['post'] = Blog::getblogcatData();
	  $comments = Blog::getgroupcommentWell();
	  $category_count = Blog::getgrouppostData();
	  return view('blog',[ 'blogData' => $blogData, 'catData' => $catData, 'blog' => $blog, 'slug' => str_replace("-"," ",$slug), 'comments' => $comments, 'category_count' => $category_count]);
	   
	}
	
	
    public function view_blog()
    {
        
	  $blogData['post'] = Blog::allpostData();
	  $slug = "Blog";
	  
	  $catData['post'] = Blog::getblogcatData();
	  $comments = Blog::getgroupcommentWell();
	  $category_count = Blog::getgrouppostData();
	  return view('blog',[ 'blogData' => $blogData, 'catData' => $catData, 'slug' => $slug, 'comments' => $comments, 'category_count' => $category_count]);
    }
	
	
	public function view_tags($slug)
	{
	$blogData['post'] = Blog::alltagData($slug);
	
	$comments = Blog::getgroupcommentWell(); 
	return view('blog',[ 'blogData' => $blogData, 'slug' => $slug, 'comments' => $comments]);
	
	}
	
	
	
	public function view_single($slug)
	{
	  $edit['post'] = Blog::editsingleData($slug);
	  $view = $edit['post']->post_view + 1;
	  $data = array('post_view'=> $view);
	  
	  $blog['popular'] = Blog::getpopularData();
	  $blogPost['latest'] = Blog::getlatestData($slug);
	  
	  Blog::updatesingleData($slug,$data);
	  $catData['post'] = Blog::getblogcatData();
	  
	  $post_tags = explode(",",$edit['post']->post_tags);
	  
	  $post_id = $edit['post']->post_id;
	  $comment['display'] = Blog::getcommentNews($post_id);
	  $count = Blog::getcommentCount($post_id);
	  $category_count = Blog::getgrouppostData();
	  return view('post', [ 'edit' => $edit, 'slug' => $slug, 'catData' => $catData, 'blog' => $blog, 'blogPost' => $blogPost, 'post_tags' => $post_tags, 'comment' => $comment, 'count' => $count, 'category_count' => $category_count]);
	 
	}
	
	
	public function insert_comment(Request $request)
	{
	   $user_id = $request->input('user_id');
	   $comment_content = $request->input('comment_content');
	   $post_id = $request->input('post_id');
	   $getcount  = Blog::commentCheck($post_id,$user_id);
	   $comment_date = date('Y-m-d');
	   
	   $data = array('post_id' => $post_id, 'user_id' => $user_id, 'comment_content' => $comment_content, 'comment_date' => $comment_date);
	   Blog::savecommentData($data);
	   return redirect()->back()->with('success', 'Thanks for your comments. Once admin will approved your comment. will publish on this post.');
	  
	   
	   
	
	}
	
	
	
	
	
}
