<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: center;
            border-radius: 6px;
        }
        .section-title {
            font-size: 16px;
            margin-top: 20px;
            color: #007bff;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .data-table th {
            background-color: #f1f1f1;
            text-align: left;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>
<body>
<div class="container">
    <p>Hello there,</p>
    <br>
    <h4>📝 New Order Received</h4>
    <br>

    <p><strong>Order #:</strong> {{ $order->order_number }}</p>
    <p><strong>SKU:</strong> {{ $order->sku }}</p>
    <p><strong>Side:</strong> {{ ucfirst($order->side) }}</p>
    <p><strong>Leg:</strong> {{ ucfirst($order->leg) }}</p>
    <p><strong>Color:</strong> {{ $order->color_desc }}</p>

    @if($order->cc)
        <h4>Lower Leg Measurements:</h4>
        <ul>
            <li>cC: {{ $order->cc }} cm</li>
            <li>cB1: {{ $order->cb1 }} cm</li>
            <li>cB: {{ $order->cb }} cm</li>
            <li>Length: {{ $order->lower_length }} cm</li>
        </ul>
    @endif

    @if($order->cg)
        <h4>Upper Leg Measurements:</h4>
        <ul>
            <li>cG: {{ $order->cg }} cm</li>
            <li>cE1: {{ $order->ce1 }} cm</li>
            <li>cD: {{ $order->cd }} cm</li>
            <li>Length: {{ $order->upper_length }} cm</li>
        </ul>
    @endif

    <p><strong>User Email:</strong> {{ $order->email }}</p>
    <p><strong>Note:</strong> {{ $order->additional_note }}</p>

    <div class="footer">
        This is an automated email from the {{ $setting->title ?? 'Medi' }} System.
    </div>
</div>
</body>
</html>
