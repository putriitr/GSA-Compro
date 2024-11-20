<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proforma Invoice #{{ $proformaInvoice->pi_number }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px 30px;
            background: #fff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ffcb05;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .invoice-info {
            text-align: right;
        }

        .invoice-info h1 {
            font-size: 28px;
            color: #ffcb05;
            margin: 0;
        }

        .invoice-info p {
            font-size: 14px;
            color: #555;
            margin: 2px 0;
        }

        .client-info p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .client-info strong {
            color: #2b3a3f;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }

        .table .total-row td {
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            text-align: center;
            color: #555;
        }

        .footer .company-info {
            font-weight: bold;
            color: #ffcb05;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('assets/img/logo-gsa2.png') }}" alt="Logo">
            <div class="invoice-info">
                <h1>PROFORMA INVOICE</h1>
                <p>Number : <strong>{{ $piNumberFormatted }}</strong></p>
                <p>Date : <strong>{{ \Carbon\Carbon::parse($proformaInvoice->pi_date)->format('F d, Y') }}</strong></p>
            </div>
        </div>

        <!-- Client Info -->
        <div class="client-info">
            <p><strong>Billed To :</strong></p>
            <p><strong>{{ $vendorName }}</strong></p>
            <p>{{ $vendorAddress }}</p>
            <p>Phone: {{ $vendorPhone }}</p>
        </div>

        <p>Dear {{ $vendorName }},</p>
        <p>Based on Purchase Order <strong>{{ $poNumberFormatted }}</strong>, PT Gudang Solusi Acommerce submits the following proforma invoice :</p>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 5%;">No.</th>
                    <th style="width: 40%;">Description</th>
                    <th style="width: 10%;">QTY</th>
                    <th style="width: 20%;">Satuan</th>
                    <th style="width: 25%;">Unit Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['qty'] }}</td>
                        <td>{{ $product['unit'] }}</td>
                        <td>{{ number_format($product['unit_price'], 2) }}</td>
                    </tr>
                @endforeach
                <!-- Summary Rows -->
                <tr>
                    <td colspan="4" class="right-align">Sub Total</td>
                    <td>{{ number_format($proformaInvoice->subtotal, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="right-align">PPN</td>
                    <td>{{ number_format($proformaInvoice->ppn, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="right-align">Grand Total Include PPN</td>
                    <td>{{ number_format($proformaInvoice->grand_total_include_ppn, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="right-align"><strong>Down Payment (DP)</strong></td>
                    <td>{{ number_format($dpPercent, 2) }}% - Rp {{ number_format($proformaInvoice->dp, 2) }}</td>
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
                <p>Account Number : 121-00-0022881-1</p>
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
