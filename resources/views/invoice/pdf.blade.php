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
            <h2>Invoice</h2>
            <p>#{{ $invoiceNumber }}</p>
        </div>

        <div class="details">
            <p>Date: {{ $date }}</p>
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
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['total'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            <p><strong>Subtotal: {{ $subtotal }}</strong></p>
            <p>Discount: {{ $discount }}</p>
            <p><strong>Total: {{ $total }}</strong></p>
        </div>
    </div>
</body>

</html>
