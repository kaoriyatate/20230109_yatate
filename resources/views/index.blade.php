<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
  <title>todoapp</title>
  <style>
    body {
      background-color: rgb(37, 0, 142);
      padding-top: 200px;
    }

    .todo_list {
      box-sizing: border-box;
      border-radius: 10px 10px;
      background-color: #FFFFFF;
      width: 550px;
      margin: 0 auto;

    }

    h1 {
      margin-left: 30px;
      padding-top: 30px;

    }

    ul {
      display: flex;
      list-style: none;
      margin-left: 270px;
      margin-top: -50px;
    }

    .logaut {
      background-color: #FFFFFF;
      border: 2px solid red;
      border-radius: 5px;
      font-weight: bold;
      color: red;
      width: 80px;
      height: 40px;
      margin-left: 10px;
      margin-top: -20px;
    }

    .find {
      background-color: #FFFFFF;
      border: 2px solid greenyellow;
      border-radius: 5px;
      font-weight: bold;
      color: greenyellow;
      width: 80px;
      height: 40px;
      margin-left: 30px;
      margin-bottom: 10px;
    }

    .content {
      margin-left: 28px;
      margin-top: -10px;
      width: 400px;
      height: 35px;
      border: 1px solid lightgray;
      border-radius: 5px;

    }

    .create {
      background-color: #FFFFFF;
      border: 2px solid orchid;
      border-radius: 5px;
      font-weight: bold;
      color: orchid;
      width: 60px;
      height: 40px;
      margin-left: 30px;

    }

    dl {
      display: flex;
      justify-content: center;

    }

    dt {
      font-weight: bold;
      color: red;

    }

    dd {
      font-weight: bold;
      color: red;

    }

    .list {
      vertical-align: middle;
      width: 500px;
    }

    .title {
      border: 1px solid lightgray;
      width: 180px;
      height: 25px;
    }

    .update {
      border: 2px solid darkorange;
      border-radius: 5px;
      font-weight: bold;
      color: darkorange;
      background-color: #FFFFFF;
      width: 60px;
      height: 35px;
    }

    .delete {
      border: 2px solid cyan;
      border-radius: 5px;
      font-weight: bold;
      color: cyan;
      background-color: #FFFFFF;
      width: 60px;
      height: 35px;

    }
  </style>
</head>

<body>
  <section>
    <div class="todo_list">
      <h1>Todo List</h1>
      </li>
      <ul>
        @if(Auth::check())
        <li>{{$user->name}}??????????????????</li>
        @endif
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <li><input class="logaut" type="submit" name="log_button" value="???????????????"></li>
        </form>
      </ul>
      <form action="/create" method="POST">
        @csrf
        <input class="find" type="submit" name="f_button" value="???????????????"><br>
        <input type="text" class="content" name="content" value="">
        <select class="form-control" id="category-id" name="category_id">
          @foreach ($categories as $category)
          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
        <button type="submit" class="create">??????</button>
        @if($errors->has('content'))
        <dl>
          <dt>ERROR</dt>
          <dd>{{$errors->first('content')}}</dd>
        </dl>
        @endif
      </form>
      <table class="list">
        <tr>
          <th>?????????</th>
          <th>????????????</th>
          <th>??????</th>
          <th>??????</th>
        </tr>
        @foreach($todos as $todo)
        <tr>
          <form action="/update" method="POST">
            @csrf
            <td>{{$todo->created_at}}</td>
            <p><input type="hidden" name="id" value="{{$todo->id}}"></p>
            <td><input type="text" class="title" name="content" value="{{ $todo->content }}"></td>
            <td><button type="submit" class="update">??????</button></td>
          </form>
          <form action="/delete" method="POST">
            @csrf
            <p><input type="hidden" name="id" value="{{$todo->id}}"></p>
            <td><input class="delete" type="submit" name="de_button" value="??????"></td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </section>
</body>

</html>