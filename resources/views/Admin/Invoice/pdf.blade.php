<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 85%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 8px 50px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #ffcb05;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header img {
            width: 180px;
            height: auto;
        }

        .invoice-info {
            text-align: right;
        }

        .invoice-info h1 {
            font-size: 40px;
            font-weight: bold;
            color: #ffcb05;
            margin: 0;
        }

        .invoice-info p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .client-info {
            font-size: 16px;
            margin-bottom: 30px;
            color: #333;
        }

        .client-info strong {
            color: #2b3a3f;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 16px;
            color: #333;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: 600;
        }

        .table td {
            background-color: #f9f9f9;
        }

        .table .total-row td {
            font-weight: bold;
            color: #007bff;
        }

        .table .total-row td:last-child {
            background-color: #fff;
        }

        .footer {
            font-size: 14px;
            color: #555;
            margin-top: 40px;
            text-align: center;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer .company-info {
            font-weight: bold;
            color: #007bff;
        }

        .footer .payment-info {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .footer .payment-info span {
            font-weight: bold;
        }

        .footer .signature {
            margin-top: 30px;
            text-align: left;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ public_path('assets/img/logo-gsa2.png') }}" alt="Company Logo">
            <div class="invoice-info">
                <h1>Invoice</h1>
                <p>Invoice Number : <strong>{{ $piNumberFormatted }}</strong></p>
                <p>Date : <strong>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('F d, Y') }}</strong></p>
            </div>
        </div>

        <!-- Client Info Section -->
        <div class="client-info">
            <p><strong>Bill To :</strong></p>
            <p><strong>{{ $vendor_name }}</strong></p>
            <p>{{ $vendor_address }}</p>
            <p>Phone : {{ $vendor_phone }}</p>
        </div>

        <p>Dear {{ $vendor_name }},</p>
        <p>We are pleased to present the following invoice based on your purchase order <strong>{{ $poNumberFormatted }}</strong>:</p>

        <!-- Products Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Brand</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->proformaInvoice->purchaseOrder->quotation->quotationProducts as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->equipment_name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->merk_type }}</td>
                        <td>{{ number_format($product->unit_price, 2) }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="4">Subtotal</td>
                    <td>{{ number_format($invoice->subtotal, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="4">PPN (%)</td>
                    <td>{{ number_format($invoice->ppn, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="4"><strong>Grand Total (Including PPN)</strong></td>
                    <td><strong>{{ number_format($invoice->grand_total_include_ppn, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Footer Section -->
        <div class="footer">
            <p>Thank you for your business!</p>
            <p><strong>PT. Gudang Solusi Acommerce</strong></p>
            <br>
            <div class="payment-info">
                <p>Kindly remit payment to :</p>
                <p class="company-info">PT. Gudang Solusi Acommerce</p>
                <p>Bank Mandiri</p>
                <p>Account Number: 121-00-0022881-1</p>
                <p>Bank Address : Bizpark Jababeka, Jl. Niaga Industri Selatan 2 Blok QQ2 No.6, Kel. Pasirsari, Kec. Cikarang Selatan, Kab. Bekasi, Prov. Jawa Barat, 17532</p>
            </div>
            <br>
            <div class="signature">
                <p>Warm regards,</p>
                <p><strong>Agustina Panjaitan</strong></p>
                <p>Director</p>
            </div>
        </div>
    </div>
</body>

</html>
