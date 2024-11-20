<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Letter #{{ $quotation->quotation_number }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        /* Variables */
        :root {
            --primary-color: #ffcb05;
            --secondary-color: #2b3a3f;
            --background-color: #f4f4f9;
            --text-color: #333;
            --table-bg: #f7f7f7;
            --table-header-bg: #e8f4fc;
            --highlight-color: #ffb800;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
        }

        .container {
            width: 85%;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--primary-color);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header img {
            width: 180px;
            height: auto;
        }

        .invoice-info {
            text-align: right;
            font-size: 18px;
            color: var(--text-color);
        }

        .invoice-info h1 {
            font-size: 36px;
            font-weight: bold;
            color: var(--primary-color);
            margin: 0;
        }

        .client-info {
            font-size: 16px;
            margin-bottom: 30px;
            color: var(--text-color);
        }

        .client-info strong {
            color: var(--secondary-color);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 16px;
            color: var(--text-color);
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: var(--table-header-bg);
            color: var(--secondary-color);
            font-weight: 600;
        }

        .table td {
            background-color: var(--table-bg);
        }

        .table tr:hover {
            background-color: var(--highlight-color);
            color: #fff;
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
            color: var(--primary-color);
        }

        .footer .payment-info {
            margin-top: 20px;
            font-size: 16px;
            color: var(--text-color);
        }

        .payment-info span {
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
            }

            .invoice-info {
                margin-top: 20px;
            }

            .table th,
            .table td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <img src="{{ public_path('assets/img/logo-gsa2.png') }}" alt="Company Logo">
            <div class="invoice-info">
                <h1>QUOTATION LETTER</h1>
                <p>Number : <strong>{{ $quotation->quotation_number }}</strong></p>
                <p>Date : <strong>{{ \Carbon\Carbon::parse($quotation->quotation_date)->format('F d, Y') }}</strong></p>
            </div>
        </div>

        <!-- Client Info Section -->
        <div class="client-info">
            <p><strong>To : </strong><span
                    class="highlighted">{{ $quotation->user->nama_perusahaan ?? 'Company Name' }}</span></p>
            <p>Dear {{ $quotation->recipient_contact_person }},</p>
            <p>Thank you for your interest in our products. Below are the quotation terms, based on the letter number {{ $referenceNumber }} : </p>
        </div>

        <!-- Products Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>QTY</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->quotationProducts as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->equipment_name ?? 'N/A' }}</td>
                        <td>{{ $product->merk_type ?? 'N/A' }}</td>
                        <td>{{ $product->quantity ?? 0 }}</td>
                        <td>{{ number_format($product->unit_price, 2) }}</td>
                        <td>{{ number_format($product->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Sub Total Price</td>
                    <td>{{ number_format($quotation->subtotal_price, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="5">Discount ({{ $quotation->discount ?? 0 }}%)</td>
                    <td>-{{ number_format($quotation->subtotal_price * ($quotation->discount / 100), 2) }}</td>
                </tr>
                <tr>
                    <td colspan="5">Sub Total II (After Discount)</td>
                    <td>{{ number_format($quotation->total_after_discount, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="5">PPN ({{ $quotation->ppn ?? 10 }}%)</td>
                    <td>{{ number_format($quotation->total_after_discount * ($quotation->ppn / 100), 2) }}</td>
                </tr>
                <tr>
                    <td colspan="5"><strong>Grand Total Price</strong></td>
                    <td><strong>{{ number_format($quotation->grand_total, 2) }}</strong></td>
                </tr>
            </tfoot>
        </table>

        <!-- Notes Section -->
        <div class="terms">
            <h3>Notes:</h3>
            @php
                // Ubah string menjadi array jika diperlukan
                $notes = is_array($quotation->notes) ? $quotation->notes : explode("\n", $quotation->notes);
            @endphp
            @if (!empty($notes))
                <ol>
                    @foreach ($notes as $index => $note)
                        <li>{{ $note }}</li>
                    @endforeach
                </ol>
            @else
                <p>No additional notes.</p>
            @endif

            <!-- Terms & Conditions Section -->
            <h3>Terms & Conditions:</h3>
            @php
                // Ubah string menjadi array jika diperlukan
                $terms_conditions = is_array($quotation->terms_conditions)
                    ? $quotation->terms_conditions
                    : explode("\n", $quotation->terms_conditions);
            @endphp
            @if (!empty($terms_conditions))
                <ol>
                    @foreach ($terms_conditions as $index => $term)
                        <li>{{ $term }}</li>
                    @endforeach
                </ol>
            @else
                <p>No specific terms and conditions.</p>
            @endif
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Kind Regards,</p>
            <p><strong>PT Gudang Solusi Acommerce</strong></p>
            <p><img src="{{ public_path('assets/img/logo-gsa2.png') }}" alt="Signature" width="150"></p>
            <p><strong>{{ $quotation->authorized_person_name ?? 'Signer Name' }}</strong></p>
            <p>{{ $quotation->authorized_person_position ?? 'Position' }}</p>
        </div>
    </div>
</body>

</html>
