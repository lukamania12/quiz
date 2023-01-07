

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Quizzes</h2>
            </div>
        </div>
        <div>
            <a href="{{route('adminpanel.qst')}}"><h3>Questions Page</h3></a>
        </div>
    </div>
    

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Quiz ID</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Created At</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td align="center">{{$post->id}}</td>
                <td align="center">{{$post->name}}</td>
                <td align="center">{{$post->desc}}</td>
                <td align="center">{{ $post->created_at}}</td>
                <td>
                    <form action="" method="POST">

                        <a href="" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>