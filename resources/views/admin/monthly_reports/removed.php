<div class="panel panel-default">
        <div class="panel-heading">
            Report
        </div>
        {!! Form::close() !!}
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Income</th>
                            <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                        </tr>
                        <tr>
                            <th>Expenses</th>
                            <td>{{ auth()->user()->currency->symbol . ' ' . number_format($exp_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                        </tr>
                        <tr>
                            <th>Profit</th>
                            <td>{{ auth()->user()->currency->symbol . ' ' . number_format($profit, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Income by category</th>
                            <th>{{ auth()->user()->currency->symbol . ' ' . number_format($inc_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</th>
                        </tr>
                    @foreach($inc_summary as $inc)
                        <tr>
                            <th>{{ $inc['name'] }}</th>
                            <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc['amount'], 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Expenses by category</th>
                            <th>{{ auth()->user()->currency->symbol . ' ' . number_format($exp_total, 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</th>
                        </tr>
                    @foreach($exp_summary as $inc)
                        <tr>
                            <th>{{ $inc['name'] }}</th>
                            <td>{{ auth()->user()->currency->symbol . ' ' . number_format($inc['amount'], 2, auth()->user()->currency->money_format_decimal, auth()->user()->currency->money_format_thousands) }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>