<html>
<a href="{{ route('posts.list') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back To The Main Page</a>
    <div><font size="+1"><p>Quiz Name: {{$post->name}}</p></font></div>
    <div><font size="+1"><p>Description: {{$post->desc}}</p></font></div>
    @if(auth()->user()->id == $post->owner_id)
    <div><font size="+1"><p>Author: {{auth()->user()->name}}</p></font></div>
    @else
    <div><font size="+1"><p>Author: Admin</p></font></div>
    @endif
    <div align="center"><font size="+1"><p>Image:</p> <img src="{{$post->image_url}}" height="150px" width="150px"></font></div>
 <a href="{{ route("posts.quiz", ["id" => $post->id]) }}">Quizis Dawyeba</a>
</html>