<a href="{{ route('posts.prpost') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Back To The Private Quizzes</a>
<table>
  <tr>
    <th>
    <font size="+1"><h2>{{$post->name}}</h2></font>
    </th>
    <th width="280px"><font size="+1">Questions {{$variable}}/{{$total}}</font></th>
  </tr>
  <tr>

    <td>
    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          </label>
  </tr>
</table>