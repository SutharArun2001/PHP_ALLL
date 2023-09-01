<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/table.css', 'resources/js/fruits.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <div class="container row align-items-center">
        @if (Route::current()->uri() == 'fruits')
            <h1 class="col-4">Favourite Fruits List</h1>
            <div  class="col-4">
                <div class="input-group">
                    <input type="search"  id="searchFruit" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" id="searchFruitBtn" class="btn btn-outline-primary">search</button>
                  </div>
            </div>
            <a class="col-4 text-right" href="{{ route('allFavouritess') }}">
                <button class="btn btn-primary">
                    Favourite Fruits
                </button>
            </a>
        @elseif(Route::current()->uri() == 'favourite')
            <h1 class="col-4">Fruits List</h1>
            <a class="col-8" href="{{ route('allFruitss') }}">
                <button class="btn btn-primary">
                    All Fruits
                </button>
            </a>
        @else
        @endif
    </div>
    <table class="col-11 ms-3">
        <thead>
            <tr>
                <td>Id</td>
                <td>Fruit Id</td>
                <td>Genus</td>
                <td>name</td>
                <td>Family</td>
                <td>Order</td>
                <td>Protein</td>
                <td>Carbohydrates</td>
                <td>Fat</td>
                <td>Calories</td>
                <td>Sugar</td>
                <td>Action</td>

            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($fruits as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fruit_id }}</td>
                    <td>{{ $item->genus }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->family }}</td>
                    <td>{{ $item->order }}</td>
                    <td>{{ $item->protein }}</td>
                    <td>{{ $item->carbohydrates }}</td>
                    <td>{{ $item->fat }}</td>
                    <td>{{ $item->calories }}</td>
                    <td>{{ $item->sugar }}</td>
                    {{-- <td>{{ $item->favourite_flag }}</td> --}}
                    <td>
                        <div class="btnDiv">
                            <div data-fruitId="{{ $item->fruit_id }}"
                                class="actions {{ $item->favourite_flag == 1 ? 'added' : '' }}"><svg width="50"
                                    height="48" viewBox="0 0 50 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M41.8009 29.2533C40.7334 30.2842 40.2484 31.77 40.4984 33.2271L42.1109 42.5509C42.6134 45.4533 40.2884 47.8105 37.6509 47.8105C36.9559 47.8105 36.2384 47.6462 35.5434 47.2843L27.1059 42.8819C26.4459 42.539 25.7234 42.3676 24.9984 42.3676C24.2759 42.3676 23.5534 42.539 22.8934 42.8819L14.4559 47.2843C13.7609 47.6462 13.0434 47.8105 12.3484 47.8105C9.71088 47.8105 7.38589 45.4533 7.88839 42.5509L9.50089 33.2271C9.75089 31.77 9.26588 30.2842 8.19838 29.2533L1.37088 22.6509C-1.31413 20.0533 0.168383 15.5271 3.87839 14.9914L13.3134 13.6319C14.7884 13.42 16.0634 12.5009 16.7209 11.1748L20.9409 2.69377C21.7709 1.02473 23.3859 0.191406 24.9984 0.191406C26.6134 0.191406 28.2284 1.02473 29.0584 2.69377L33.2784 11.1748C33.9359 12.5009 35.2109 13.42 36.6859 13.6319L46.1209 14.9914C49.8309 15.5271 51.3134 20.0533 48.6284 22.6509L41.8009 29.2533Z"
                                        fill="#717579" />
                                </svg></div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="row justify-content-center">
        <div class="col-3 mt-3  ">
            {{ $fruits->links() }}
        </div>
    </div>
</body>

</html>
