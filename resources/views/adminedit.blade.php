@if ($post->id == Null)
<form action="">
        <div class="mb-3">
            <label for="editquizid" class="form-label">Quiz ID</label>
            <input type="number" name='quiz_id' class="form-control" id="editquizid" placeholder="Quiz ID">
        </div>
        <div class="mb-3">
            <label for="editimage" class="form-label">Image URL(Entering wrong image url will cause visual bug)</label>
            <input type="text"  name="image_url" class="form-control" id="editimage" placeholder="Image URL(Please Enter Correct Image URL)">
        </div>
        <div class="mb-3">
            <label for="editbody" class="form-label">Body</label>
            <textarea name="question" class="form-control" id="editbody" rows="3">
                {{ $post->question}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   @else
   <form action="">
   <table>
   <tr>
        <th width="280px"><h2>Quiz ID</h2></th>
            <th width="280px"><h2>Question</h2></th>
            <th width="280px"><h2>Created At</h2></th>
        </tr>
    <tr>
    <td align="center">
            <input type="number" name="quiz_id" class="form-control" value = "{{$post->quiz_id}}" id="editquizid" placeholder="Quiz ID">
            <input type="hidden" id="iurl" name="image_url" value="{{$post->image_url}}">
            <input type="hidden" id="qst" name="question" value="{{$post->question}}"></td>
    <td align="center">{{$post->question}}</td>
    <td align="center">{{$post->created_at}}</td>
    </tr>
    </table>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   @endif