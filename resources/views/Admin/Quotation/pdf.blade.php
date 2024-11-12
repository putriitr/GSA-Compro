<!DOCTYPE html>
<html lang="en">
@php
    $compro = \App\Models\CompanyParameter::first();
@endphp

<head>
    <meta charset="UTF-8">
    <title>Quotation Invoice</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Mengimpor font Montserrat dari Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap');

        .header {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .logo {
            width: 80px;
            /* Atur ukuran logo sesuai kebutuhan */
            margin-right: 15px;
            /* Spasi antara logo dan teks */
        }

        .company-name {
            font-family: 'Montserrat', sans-serif;
            /* Menggunakan font Montserrat */
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            /* Warna teks agar terlihat modern */
            margin: 0;
        }

        .header,
        .footer {
            text-align: center;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 33%;
            max-width: 150px;
            height: auto;
        }

        .header h1 {
            flex: 1;
            font-size: 24px;
            margin-left: 20px;
        }

        .quotation-info {
            text-align: right;
            margin-bottom: 20px;
        }

        .content {
            margin: 20px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .merge-cell {
            text-align: left;
            font-weight: bold;
        }

        .merge-cell-total {
            text-align: right;
            font-weight: bold;
        }

        .notes,
        .condition {
            margin-top: 20px;
        }

        .signature {
            margin-top: 50px;
            text-align: left;
        }

        .signature p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('assets/img/logo-gsa2.png') }}" alt="Company Logo" class="logo">
        <h1 class="company-name">PT GUDANG SOLUSI ACOMMERCE</h1>
    </div>

    <!-- Quotation Info -->
    <div class="quotation-info">
        <h2>QUOTATION LETTER</h2>
        <p><strong>Number :</strong> {{ $quotation->quotation_number }}</p>
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($quotation->quotation_date)->format('F j, Y') }}</p>
    </div>

    <!-- To and Dear Section -->
    <div class="content">
        <p><strong>To: {{ $quotation->recipient_company }}</strong></p>
        <p>Dear {{ $quotation->recipient_contact_person }},</p>
        <p class="justify-text">Thank you for your interest in our products. With reference to your letter number
            {{ $quotation->quotation_number }}, PT Gudang Solusi Acommerce is pleased to submit our quotation with the
            following terms & conditions : </p>
    </div>

    <!-- Table Section -->
    <table class="table">
        <!-- Product List -->
        <tr>
            <th>No</th>
            <th>Name of Equipment</th>
            <th>Merk Type</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>
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

        <!-- Summary Section -->
        <tr class="text-center">
            <td colspan="5" class="merge-cell text-center">Sub Total Price</td>
            <td class="merge-cell-total text-center">{{ number_format($quotation->subtotal_price, 2) }}</td>
        </tr>
        <tr class="text-center">
            <td colspan="5" class="merge-cell text-center">Discount (%)</td>
            <td class="merge-cell-total text-center">{{ $quotation->discount ?? 0 }}%</td>
        </tr>
        <tr class="text-center">
            <td colspan="5" class="merge-cell text-center">Sub Total II (After Discount)</td>
            <td class="merge-cell-total text-center">{{ number_format($quotation->total_after_discount, 2) }}</td>
        </tr>
        <tr class="text-center">
            <td colspan="5" class="merge-cell text-center">PPN (%)</td>
            <td class="merge-cell-total text-center">{{ $quotation->ppn ?? 10 }}%</td>
        </tr>
        <tr class="text-center">
            <td colspan="5" class="merge-cell text-center">Grand Total Price</td>
            <td class="merge-cell-total text-center">{{ number_format($quotation->grand_total, 2) }}</td>
        </tr>
    </table>

    <!-- Notes Section -->
    <div class="notes">
        <p><strong>Note :</strong></p>
        @if (!empty($quotation->notes))
            <ol>
                @foreach (explode("\n", $quotation->notes) as $note)
                    <li>{{ $note }}</li>
                @endforeach
            </ol>
        @else
            <p>{{ __('No additional notes.') }}</p>
        @endif
    </div>

    <!-- Condition Section -->
    <div class="condition">
        <p><strong>Terms and Conditions :</strong></p>
        @if (!empty($quotation->terms_conditions))
            <ol>
                @foreach (explode("\n", $quotation->terms_conditions) as $term)
                    <li>{{ $term }}</li>
                @endforeach
            </ol>
        @else
            <p>{{ __('No specific terms and conditions.') }}</p>
        @endif
    </div>

    <!-- Signature Section -->
    <div class="signature">
        <p>Sincerely,</p><br><br>
        <p style="margin-top: 50px;">___________________________</p>
        <p>{{ $quotation->authorized_person_name ?? 'N/A' }}</p>
        <p>{{ $quotation->authorized_person_position ?? 'N/A' }}</p>
        <p>PT Gudang Solusi Acommerce</p>
    </div>

    <div class="footer">
        <h4><strong>PT Gudang Solusi Acommerce</strong></h4>
        <p><i class="fa fa-map-marker-alt me-2"></i> {{ $compro->alamat }}</p>
        <p><i class="fas fa-envelope me-2"></i> {{ $compro->email }} | <i class="fas fa-phone-alt fa-2x"></i>
            {{ $compro->no_telepon }}</p>
    </div>
</body>

</html>
