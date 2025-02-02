<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo img {
            height: 50px;
        }

        .vendor h5 {
            text-align: center;
        }

        .vendor-container {
            margin-top: 100px;
        }

        .custom-btn {
            background: linear-gradient(45deg, #1e44ec, #f72e7a);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .custom-btn:hover {
            transform: scale(1.05);
            background: linear-gradient(45deg, #1e44ec, #f72e7a);
        }

        .vendor-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
            position: relative;
            transition: transform 0.3s, border-color 0.3s;
            cursor: pointer;
            max-height: 250px;
            height: 250px;
            overflow: hidden;
        }

        .vendor-card:hover {
            transform: scale(1.05);
            border-color: #007bff;
        }

        .vendor-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .vendor-card h5 {
            text-align: center;
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            margin: 0;
            font-size: 1rem;
        }

        .vendor-card.selected {
            border-color: #007bff;
            background-color: #eef6ff;
        }

        .header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .header-bar h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .header-bar input,
        .header-bar button {
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .vendor-card {
                max-height: 250px;
                height: 250px;
            }

            .vendor-card h5 {
                font-size: 0.9rem;
            }

            .header-bar h1 {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            .vendor-card {
                max-height: 200px;
                height: 200px;
            }

            .vendor-card h5 {
                font-size: 0.8rem;
            }

            .header-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-bar h1 {
                margin-bottom: 10px;
            }

            .header-bar input,
            .header-bar button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="{{ asset('vendor/images/logo.png') }}" alt="Logo">
    </div>

    <div class="container vendor-container">
        <div class="row header-bar align-items-center">
            <div class="col-12 col-md-6">
                <h1><b>Please select your vendor type</b></h1>
            </div>
            <div class="col-12 col-md-6">
                <form action="{{ route('vendor.vendorType') }}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" id="brandName" placeholder="Your Brand Name"
                            readonly>
                        <input type="hidden" name="vendor_type" id="vendorTypeId">
                        <button type="submit" class="custom-btn">Continue</button>
                    </div>
                    @error('vendor_type')
                        <span class="text-danger">{{ 'The Vendor Type is required' }}</span>
                    @enderror
                </form>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($vendorstype as $data)
                <div class="vendor col-md-3">
                    <div class="vendor-card" data-vendor-type="{{ $data->name }}"
                        data-vendor-id="{{ $data->id }}">
                        <img src="{{ asset('admin/vendors/' . $data->image) }}" alt="Venues">
                    </div>
                    <h5 class="mt-3">{{ $data->name }} (54)</h5>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.vendor-card').on('click', function() {
                let vendorName = $(this).data('vendor-type');
                let vendorId = $(this).data('vendor-id');
                $('#brandName').val(vendorName);
                $('#vendorTypeId').val(vendorId);
            });
        });
    </script>

</body>

</html>
