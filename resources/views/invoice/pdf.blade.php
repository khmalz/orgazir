<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .invoice {
            width: 400px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .details {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .totals {
            margin-top: 10px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="header">
            <h2>Struk</h2>
            <h4>Toko ABC</h4>
            <p>#{{ $transaction->code }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction->items as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['standard_price'], 0, ',', '.') }}</td>
                        <td>{{ number_format($item['quantity'] * $item['standard_price'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            <p><strong>Subtotal: Rp{{ number_format($transaction->subtotal, 0, ',', '.') }}</strong></p>
            <p>Diskon: {{ $transaction->discount }}%</p>
            <p><strong>Total: Rp{{ number_format($transaction->total, 0, ',', '.') }}</strong></p>
        </div>

        <div class="details">
            <p>{{ $transaction->created_at->format('d F Y H:i:s') }}</p>
        </div>
    </div>
</body>

</html>
