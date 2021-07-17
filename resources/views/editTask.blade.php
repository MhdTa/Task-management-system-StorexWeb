@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Task Info</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" method="post" action="{{ route('task.edit', $task->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="taskTitle" name="taskTitle"
                                            value="{{ $task->title }}">
                                    </div>

                                </div>

                                <hr class="mb-4">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Edit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
            @endsection
