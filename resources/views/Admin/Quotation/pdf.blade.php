<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quotation #{{ $quotation->id }}</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <h1>Quotation #{{ $quotation->id }}</h1>
    <p><strong>Distributor:</strong> {{ $quotation->user->name }}</p>
    <p><strong>Product:</strong> {{ $quotation->produk->nama }}</p>
    <p><strong>Quantity:</strong> {{ $quotation->quantity }}</p>
    <p><strong>Grand Total:</strong> {{ number_format($quotation->grand_total, 2) }}</p>
    <!-- Add other quotation details as needed -->
</body>
</html>
