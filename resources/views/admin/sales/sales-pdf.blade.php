<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }
    </style>
</head>

<body>

    <h2>{{ $event->title }} – Satış Raporu</h2>

    <table>
        <tr>
            <th>Bilet</th>
            <th>Satılan</th>
            <th>Ciro</th>
        </tr>

        @foreach ($event->tickets as $ticket)
            <tr>
                <td>{{ $ticket->name }}</td>
                <td>{{ $ticket->orders->sum('quantity') }}</td>
                <td>{{ $ticket->orders->sum('total_price') }} ₺</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
