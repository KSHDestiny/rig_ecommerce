<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{!! $product->name !!}">
    <meta property="og:title" content="{{ $product->summary }}">
    <meta property="og:description" content="{!! $product->price !!}">
    <meta property="og:image" content="{{ asset("/uploads/products/$product->image") }}">

    <title>Product</title>
    <!-- Add Bootstrap 5 link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        /* CSS class for the shadow */
        .shadow-on-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }



        /* Media query to hide shadow on small screens */
        @media (max-width: 576px) {
            .shadow-on-md {
                box-shadow: none;
            }
        }


    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row py-5 shadow-on-md">
           <div class="col-12 col-lg-4 col-md-12">
                <img src="{{ asset("/uploads/products/$product->image") }}" alt="description" width="400px" height="400px">
            </div>
            <div class="col-12 col-lg-8 col-md-12 py-5">
                <div class="mb-3"><span class="text-warning" style="font-size:1.5em;">{{ $product->category->name }}</span> </div>

                <div class="mb-2 fs-5 fw-bold">{{ $product->name }}</div>
                <div class="fw-bold fs-4 mb-2">{{number_format($product->price)}}<small class="fs-13 ps-2 fw-bold">MMK</small></div>
                <div class="fs-6 fw-normal">{!!$product->summary!!}</div><br>
                <div class="fs-6 fw-normal">{!!$product->description!!}   </div><br>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap 5 JavaScript link (optional, only if you need Bootstrap JavaScript features) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
