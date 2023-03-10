
<h3><a href="{{route('posts.prpost')}}">Private Quizzes</a></h3>

<body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
@if (auth()->check())
   @if (auth()->user()->id == 1)
      Hello Admin!
      <a href="{{route('adminpanel.qst')}}">Admin Panel</a>
   @else
   @endif
@endif
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quiz Application </h2>
            </div>
        </div>
    </div>
    

    <table class="table table-bordered table-responsive-lg">
        <tr>
        <th width="280px">Name</th>
            <th>Picture</th>
            <th width="280px">Questions</th>
            <th width="280px">Created At</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td align="center"><h2>{{$post->name}}</h2></td>
                <td align="center"><img src="{{$post->image_url}}" height="150px" width="150px"></td>
                <td align="center"><h3>{{$total}}</h3></td>
                <td align="center">{{ $post->created_at}}</td>
                <td align="center"><h2><a href="{{ route("posts.post", ["id" => $post->id]) }}">Complete Quiz</a></h2></td>
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