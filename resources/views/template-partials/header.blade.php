<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/templates/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    @stack('style')
    <!-- Custom styles for this template-->
    <link href="{{ asset('/templates/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        
        .hover-shadow {
            transition: transform 0.2s, box-shadow 0.2s;
        }
    
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .img-container {
        overflow: hidden; /* Menyembunyikan bagian gambar yang lebih besar dari wadah */
        height: 200px; /* Atur tinggi sesuai kebutuhan */
    }

    .hover-zoom {
        transition: transform 0.3s ease; /* Transisi halus */
        width: 100%; /* Pastikan gambar memenuhi wadah */
        height: auto; /* Menjaga rasio aspek gambar */
    }

    .card:hover .hover-zoom {
        transform: scale(1.2); /* Memperbesar gambar tanpa memperbesar elemen */
    }
    </style>

</head>