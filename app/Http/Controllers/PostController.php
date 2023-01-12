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

    public function createorupdate(Request $request,Quiz $post) {
        $question = $post->questions()->with('answers')->get();
        if (count($request->all()) > 0) {
            $data = $request->all();
            $question->question = $data['question'];
            $question->quiz_id = $data['quiz_id'];
            $question->creator_id = $data['creator_id'];
            $question->image_url = $data['image_url'];
            $question->answers->answer = $data['answer'];
            $question->answers->question_id = $data['question_id'];
            $question->answers->quiz_id = $data['quiz_id'];
            $question->answers->is_correct = $data['is_correct'];
            $question->save();
            return redirect()->route('adminpanel.qst');
    }

    return view('edit', ["post" => $post,"question" => $question]);
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
            $data = $request->all();
            $post->quiz_id = $data['quiz_id'];
            $post->question = $data['question'];
            $post->image_url = $data['image_url'];
            $post->creator_id = 1;
            $post->save();
            return redirect()->route('adminpanel.qst');
    }
   return view('adminedit', ["post" => $post]);
    }
    public function correctanswers () {
        return view('correctanswers');
    }
}
