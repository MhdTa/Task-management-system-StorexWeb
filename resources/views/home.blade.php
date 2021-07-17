@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->

    <!-- ============================================================== -->

    <!-- recent orders  -->
    <div class="dropdown" style="float:left">
        <button class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Filter
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="?sort=Latest">Sort by Latest Tasks </a>
            <a class="dropdown-item" href="?sort=Oldest">Sort by Oldest Task </a>
            <a class="dropdown-item" href="?sort=todo">Sort by todo Task </a>
            <a class="dropdown-item" href="?sort=Done">Sort by Done Task </a>
            @if (request()->get('done'))
            <a class="dropdown-item" href="/"> Show Done Tasks </a>
        @else
            <a class="dropdown-item" href="?done=hidden">  Hide Done Tasks </a>
        @endif
        </div>
    </div>
  
        <div style="float: left; " class="btn-primary">
            <a href="{{ route('checkList.add') }}" class="btn " style="color:#fff"> +</a>
        </div>
   
    <div class="row">
      
        @foreach ($checkLists as $checkList)
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">{{ $checkList->title }}
                        <span style="color: #8d8db7;font-size:12px">
                            {{ $checkList->created_at->diffForHumans() }}
                        </span>
                        <div class="dropdown" style="float:left">
                            <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if($checkList->status != 'Done')
                                <a class="dropdown-item" href="{{ route('checkList.done', $checkList->id) }}"> Done! </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('checkList.edit', $checkList->id) }}"> Edit </a>
                                <form class="dropdown-item" action="{{ route('checkList.destroy', $checkList->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger " value="Delete ">
                                </form>
                            </div>
                        </div>
                        {{-- <input data-style="ios" type="checkbox"  data-on="Hide Done Tasks" data-off="Show" checked data-toggle="toggle"> --}}
                      
                    </h5>
                    <h5 class="card-header"><span class="badge-dot badge-brand mr-1"></span>Status:
                        {{ $checkList->status }}
                    </h5>
                    <h4 class="card-header">Tasks</h4>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">#</th>
                                        <th class="border-0">Title</th>

                                        <th class="border-0">Status</th>
                                        <th class="border-0">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($checkList->task->count() > 0)
                                        @foreach ($checkList->task as $index => $task)
                                            @if (!request()->get('done') || $task->status != 'Done')
                                                <tr>
                                                    <td> {{ $index+1 }} </td>

                                                    <td> {{ $task->title }}</td>
                                                    <td><span
                                                            class="badge-dot badge-brand mr-1"></span>{{ $task->status }}
                                                    </td>
                                                    <td> {{ $task->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{ route('task.done', $task->id) }}"> <button
                                                                class="btn btn-primary ">
                                                                @if ($task->status == 'todo') Done!
                                                                @else todo
                                                                @endif
                                                            </button> </a>
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('task.edit', $task->id) }}"> <button
                                                                class="btn btn-green ">Edit</button> </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('task.destroy', $task->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="btn btn-danger " value="Delete ">
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif










                                    <td colspan="9">
                                        <form method="post" action="{{ route('task.add', $checkList->id) }}">
                                            @csrf
                                            <input style="float: left;width: 200px;margin-right: 20px;" type="text"
                                                class="form-control" id="taskTitle" name="taskTitle"
                                                placeholder="Task Title">
                                            <input style=" width: 200px;height: 34px;padding: 0px;"
                                                class="btn btn-primary btn-lg btn-block" type="submit" value="Add Task">
                                        </form>

                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


       


        <!-- ============================================================== -->
        <!-- end recent orders  -->


       

        
    </div>
   
   
@endsection
