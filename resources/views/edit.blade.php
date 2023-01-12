<a href="{{ route('posts.prpost') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back To The Private Quizzes</a>
<a href="{{ route('adminpanel.edit',["quizid" => $post])}}" class="text-sm text-gray-700 dark:text-gray-500 underline">Add Question</a>
<form action="">
@foreach ($question as $questions)
<table>
  <tr>
    <th>
    <label for="editquestion"><h2>Question</h2></label>
    <input type="text" name="question" class="form-control form-control-lg" value = "{{$questions->question}}" id="editquestion" placeholder="Question">
    <input type="hidden" name="quiz_id" value = "{{$questions->quiz_id}}">
    <input type="hidden" name="creator_id" value = "{{auth()->user()->id}}"></td>
    </th>
    <th>
    <label for="editimage">Image URL(Enter Correct Image URL To Avoid Visual Bug)</label>
    <input type="text" name="image_url" class="form-control form-control-lg" value = "{{$questions->image_url}}" id="editimage" placeholder="Image URL">
    </th>
  </tr>
  <tr>
@foreach($questions['answers'] as $answer)
    <td>
    <td align="center">
    <label for="editanswer"><h3>Answer</h3></label>
    <input type="text" name="answer" class="form-control form-control-lg" value = "{{$answer->answer}}" id="editanswer" placeholder="Answer">
    <input type="hidden" name="question_id" value = "{{$answer->question_id}}">
    <label for="editcorrect">Is Correct(0=>wrong,1=>correct)</label>
    <input type="number" min="0" max="1" name="is_correct" class="form-control form-control-lg" value = "{{$answer->is_correct}}" id="editanswer" placeholder="Answer"></td>
    </td>
    @endforeach
  </tr>
</table>
@endforeach
<button type="submit" class="btn btn-primary">Submit</button>
</form>
