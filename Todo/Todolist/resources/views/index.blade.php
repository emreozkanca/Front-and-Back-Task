<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-do List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                {{-- if tasks count --}}
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todolists as $todolist)
                        <li class="list-group-item">
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                {{ $todolist->content}}
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button><a href="todo/{{$todolist->id}}/edit" class="btn btn-link btn-sm float-end fas fa-edit"></a>
                            </form>
                        </li>
                    @endforeach
                @endif
                </ul>
                @if(count($todolists) == 0)
                    <p class="text-center mt-3">No Tasks!</p>
                @endif
            </div>
            <span>
                {{ $todolists->links()}}
            </span>

            <div class="card-footer">
            Total Task {{ count($todolists) }}
            </div>
        </div>
    </div>

</body>
<style>
    .w-5 {
        display: none;
    }
</style>
        <div>
            <form action="{{ route('search') }}" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                    <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
</html>
