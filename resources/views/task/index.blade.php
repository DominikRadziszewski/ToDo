@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">To Do App</h4>

            <form method="POST" action="{{ route('task.store') }}" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                @csrf
        
                <div class="col-12">
                    <input type="text" name="task" id="task" class="form-control" placeholder="Enter a task here" required autocomplete="name" autofocus/>
                </div>
        
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        
                <div class="col-12">
                    <button type="button" class="btn btn-warning">Get tasks</button>
                </div>
            </form>
        
            <table class="table mb-4">
                <thead>
                    <tr>
                        <th scope="col">No.</th>                        
                        <th scope="col">Todo item</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <th style="{{ getStatusStyle($task->status) }}">{{ $task->id }}</th>
                            <td style="{{ getStatusStyle($task->status) }}">{{ $task->task }}</td>
                            <td style="{{ getStatusStyle($task->status) }}">{{ $task->status }}</td>
                            <td>
                                <form method="POST" action="{{ route('task.delete', ['id' => $task->id]) }}" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        @endsection
        @php
        function getStatusStyle($status) {
            switch ($status) {
                case 'Done':
                    return 'color: green;';
                case 'In Progress':
                    return 'font-weight: bold;';
                case 'Not Started':
                    return 'color: red;';
                default:
                    return '';
            }
        }
    @endphp