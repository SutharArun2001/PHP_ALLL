<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="/css/table.css">
</head>

<body>
    {{-- @if (Session::has('email'))
        {{Session::get('email')}}
    @else --}}
        
    {{-- @endif --}}
    <a class="" href="{{ url('/register') }}">
        <button class="btn btn-primary">
            Add
        </button>
    </a>
    {{-- <a class="" href="{{ url('/login') }}">
        <button class="btn btn-primary">
            Login
        </button>
    </a> --}}
    <a class="" href="{{ url('/logout') }}">
        <button class="btn btn-primary">
            logout
        </button>
    </a>
    <br>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Student Id</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1;
            @endphp
            @foreach ($student as $std)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $std->id }}</td>
                    <td>{{ $std->firstname }}</td>
                    <td>{{ $std->lastname }}</td>
                        <td>{{ $std->email }}</td>
                    <td>{{ $std->phonenumber }}</td>
                    <td>{{ $std->gender }}</td>
                    <td>
                        <a href="{{ route('row.edit', ['id' => $std->id]) }}">
                            <div class="actions"><img src="/img/edit.svg" alt="" srcset=""></div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('row.delete', ['id' => $std->id]) }}">
                            <div class="actions"><img src="/img/delete.svg" alt="" srcset=""></div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('row.edit', ['id' => $std->id]) }}">
                            <div class="actions"><img src="/img/show.svg" alt="" srcset=""></div>
                        </a>
                    </td>
                </tr>
                @php
                    $index++;
                @endphp
            @endforeach
        </tbody>
    </table>

</body>

</html>
