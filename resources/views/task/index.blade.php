@extends('layouts/main')

@section('title')
    Your TaskManager
@endsection


@section('content')
  <div id="all-tasks">
    <section class="header">
      <div class="top">
        <div class="welcome">
          Welcome {{$user->name}}
          <a href="{{ route('logout') }}">
                  Logout
          </a>
        </div>
        <div class="logo">
          TaskManager
        </div>
        <div class="task-total">
          <div class="task">
           <span class="number">{{count($todos)}}</span> All-tasks
          </div>
          <div class="task">
            <span class="number">{{count($complete)}}
            </span>Completed
          </div>
        </div>
        <div class="add-circle">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </div>
      </div>
    </section>

    @foreach ($todos as $todo)
    <section class="content-area">
      <div class="container">
        <div class="task-container">
          <div class="task-box">

            <div class="title">
              {{$todo->title}}
            </div>
            <div class="date">

              {{$todo->created_at}}

            </div>

            <a href="/task/update/{{$todo->id}}">
            @if ($todo->completed==1)
              <div class="check-box active">
            @else
              <div class="check-box">
            @endif
                <i class="fa fa-check"></i>

              </div>
            </a>
            <a href="/task/update/{{$todo->id}}/delete">
              <i class="fa fa-trash"></i>
            </a>

            <div class="notes">

              {{$todo->notes}}

            </div>
          </div>
        </div>
      </div>
    </section>
    @endforeach

    <section class="task-form">
      <div class="close-btn">
        <i class="fa fa-times"></i>
      </div>
      <form action="/tasks" method="POST">
        @csrf
        <div class="form-group">
          <h3>Add A Task</h3>
          <label for="title">Title:</label>
          <input type="text" name="title">
        </div>
        <div class="form-group">
          <label for="notes">Notes:</label>
          <textarea name="notes"></textarea>
        </div>
        <div class="form-group">
          <button type="submit">Add New Task</button>
        </div>
      </form>
    </section>

  </div>
  <script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
      $('.add-circle').on('click', function () {
        $('.task-form').addClass('active');
      });

      $('.check-box').on('click', function () {
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
        }else {
          $(this).addClass('active');
        }
      });

      $('.task-form .close-btn').on('click', function () {
        $('.task-form').removeClass('active');
      });
    });
  </script>
@endsection
  </body>
</html>
