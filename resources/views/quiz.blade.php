<a href="{{ route('posts.list') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back To The Main Page</a>
@foreach ($question as $questions)
<div style="display:none;">
{{++$variable}}
</div>
<table>
  <tr>
    <th>
    <font size="+1"><h2>{{$questions->question}}</h2></font>
    </th>
    <th width="280px"><font size="+1">Questions {{$variable}}/{{$total}}</font></th>
  </tr>
  <tr>
@foreach($questions['answers'] as $answer)
    <td>
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            {{$answer->answer}}
          </label>
          @endforeach
  </tr>
</table>
@endforeach