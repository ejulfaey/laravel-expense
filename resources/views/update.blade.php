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
                        @forelse($expenses as $exp)
                        <tr>
                            <td align="center">{{ $loop->iteration }}</td>
                            <td>{{ $exp->item }}</td>
                            <td>{{ $exp->amount }}</td>
                            <td>{{ date('d M Y', strtotime($exp->created_at)) }}</td>
                            <td>
                                <a href="{{ route('edit', $exp) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('delete', $exp) }}" class="btn btn-sm btn-danger">Delete</a>
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
                        Update {{ $expense->item }}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('update', $expense) }}" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="item">Item</label>
                                <input type="text" id="item" name="item" placeholder="Enter your item..." value="{{ $expense->item }}" class="form-control">
                                @if($errors->has('item')) <span class="text-danger">{{ $errors->first('item') }}</span>@endif
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" id="amount" name="amount" placeholder="Enter your amount..." value="{{ $expense->amount }}" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer border-0 text-right bg-white">
                        <a href="{{ route('index') }}" class="btn btn-warning">Back</a>
                        <input type="submit" form="form" class="btn btn-primary" value="Save">
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>