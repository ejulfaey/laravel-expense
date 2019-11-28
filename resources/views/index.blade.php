<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row px-3 py-5">
            <div class="col-md-8 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center">#</th>
                        <th>Item</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse($expenses as $expense)
                        <tr>
                            <td align="center">{{ $loop->iteration }}</td>
                            <td>{{ $expense->item }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ date('d M Y', strtotime($expense->created_at)) }}</td>
                            <td>
                                <a href="/edit/{{ $expense->id }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/delete/{{ $expense->id }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" align="center">No transaction..</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card mb-5 border-0 shadow bg-primary">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <p class="text-white">Total Expenses</p>
                            <h2 class="text-white">RM {{ number_format($total, 2) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0">
                        New Expenses
                    </div>
                    <div class="card-body">
                        <form method="post" action="/store" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" id="item" name="item" placeholder="Enter your item..." value="{{ old('item') }}" class="form-control">
                                @if($errors->has('item')) <span class="text-danger">{{ $errors->first('item') }}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" id="amount" name="amount" placeholder="Enter your amount..." value="{{ old('amount') }}" class="form-control">
                                @if($errors->has('amount')) <span class="text-danger">{{ $errors->first('amount') }}</span>@endif
                            </div>
                        </form>
                    </div>
                    <div class="card-footer border-0 text-right bg-white">
                        <input type="submit" form="form" class="btn btn-primary" value="Add Expenses">
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>