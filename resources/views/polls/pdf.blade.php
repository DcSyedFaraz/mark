<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1 class="my-4 text-center">Q: {{ $polls->question }}</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Option</th>
                        <th>Voted by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($polls->options as $option)
                        <tr>
                            <td>{{ $option->options }}</td>
                            @if ($option->votess->count() > 0)
                                <td>
                                    @foreach ($option->votess as $vote)
                                        <span class="badge bg-primary text-white">{{ $vote->user->name }}</span>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                            @else
                                <td><span class="badge bg-warning">No Votes</span></td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
<style>
    /* Style the container */
.container {
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 80%;
    margin: auto;
}

/* Style the header */
.my-4 {
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
}

/* Style the table */
.table-striped {
    background-color: #f2f2f2;
}

.table-hover tbody tr:hover {
    background-color: #ddd;
}

/* Style the table header */
.table th {
    background-color: #4CAF50;
    color: white;
}

/* Style the badges */
.badge {
    padding: 8px 10px;
    font-size: 12px;
    border-radius: 20px;
    margin-right: 5px;
}

.bg-primary {
    background-color: #007BFF;
}

.bg-warning {
    background-color: #FFC107;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.container {
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 80%;
    margin: 2rem auto;
}

h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-top: 1.5rem;
    margin-bottom: 1.5rem;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:hover {
    background-color: #ddd;
}

.badge {
    padding: 8px 10px;
    font-size: 12px;
    border-radius: 20px;
    margin-right: 5px;
}

.bg-primary {
    background-color: #007BFF;
    color: white;
}

.bg-warning {
    background-color: #FFC107;
}
</style>
</body>

</html>
