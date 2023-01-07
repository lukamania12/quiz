<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Auth;

class PostController extends Controller
{
    public function list () {
        $posts = DB::table('quizzes')->orderByDesc('created_at')->where('is_private', '=' , '0')->get();
        $total1 = Quiz::withCount('questions')->get();
        $total = $total1->sum('questions_count');
        return view('index' , ['posts' => $posts,'total' => $total]);
    }

    public function pr_list () {
        $posts = DB::table('quizzes')->where('is_private', '=' , '1')->where('owner_id','=', auth()->user()->id)->orderByDesc('created_at')->get();
        $total1 = Quiz::withCount('questions')->where('is_private', '=' , '1')->get();
        $total = $total1->sum('questions_count');
        return view('index_private' , ['posts' => $posts,'total' => $total]);
    }

    public function post ($id) {
        $post = Quiz::find($id);
        return view('post',['post' => $post]);
    }

    public function postquiz ($id) {
        $post = Quiz::find($id);
        $question = $post->questions()->with(['answers' => function($query) use($id) {
            $query->where('quiz_id',$id);
        }])->get();
        $total1 = $post->withCount('questions')->get('id');
        $total = $total1->sum('questions_count');
        $variable = 0;
        return view('quiz',['post' => $post,'question'=> $question,'total' => $total,'variable' => $variable]);
    }

    public function deletequiz (Quiz $post) {
        $post->delete();
        $post->questions()->delete();
        $post->questions()->answers()->delete();
        return redirect()->route('posts.list');
    }

    public function delete (Question $post) {
        $post -> delete();
        return redirect()->route('posts.prpost');
    }

    public function upload (Quiz $post) {
        $post->is_private = '0';
        $post->save();
        return redirect()->route('posts.list'); 
    }

    public function createorupdate(Request $request,Quiz $post, Quiz $post2) {
        $question = $post->questions()->with(['answers' => function($query) use($post) {
            $query->where('quiz_id',$post);
        }])->get();
        if ($request->input("quizname")) {
            $post->fill($request->all())->save();
            return redirect()->route('posts.prpost');
    }
    return view('edit', ["post" => $post]);
}
    public function adminpanelqst (Request $request) {
        $questions = Question::all();
        return view('adminpanelqst',["questions" => $questions]);
  
    }
    public function adminpanelquiz () {
        $posts = Quiz::all();
        return view('adminpanelquiz',["posts" => $posts]);
    }
    public function adminpaneledit (Request $request,Question $post) {
        if ($request->input("quiz_id")) {
            $post->fill($request->all())->save();
            return redirect()->route('adminpanel.qst');
    }
   return view('adminedit', ["post" => $post]);
    }
}
