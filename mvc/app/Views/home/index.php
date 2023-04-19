<h1>Home page</h1>
<h2>{{$title}}</h2>
<div>
    <p>{{$user_numb}}</p>
</div>
<ul>
    @foreach ($users as $user)
    <li>{{$user}}</li>
    @endforeach
</ul>
