<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Questions </h2>
            </div>
        </div>
        <div>
            <a href="{{route('posts.list')}}"><h3>Main Page</h3></a>
        </div>
        <div>
            <a href="{{route('adminpanel.quiz')}}"><h3>See Quizzes</h3></a>
        </div>
        <div>
            <a href="{{route('adminpanel.edit')}}"><h3>Add Question</h3></a>
        </div>
    </div>
    
<form action="">
    <table class="table table-bordered table-responsive-lg">
        <tr>
        <th width="280px">Quiz ID</th>
            <th width="280px">Question</th>
            <th width="280px">Created At</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($questions as $questions)
            <tr>
                <td align="center"><h3>
                {{$questions->quiz_id}}
                </h3></td>
                <td align="center">{{$questions->question}}</td>
                <td align="center"><h3>{{$questions->created_at}}</h3></td>
                <td align="center"><a href="{{route('adminpanel.edit', ["post" => $questions->id])}}">Edit Quiz ID</a></td>
                <td>
                    <form action="" method="POST">

                        <a href="" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <div>
            </div>
            </form>
    </table>