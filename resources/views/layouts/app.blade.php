<!DOCTYPE html>
<html lang="en">                                                                                                                                        
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    
    <!-- إضافة Bootstrap من CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
<script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <header>
        <nav>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">Add Product</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('brands.index') }}">Brands</a></li>
                
                <!-- روابط للأوامر وعناصر الأوامر -->
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('order_items.index') }}">Order Items</a></li> --}}
            </ul>
            
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    {{-- <footer>
        <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
    </footer> --}}
    
    <!-- إضافة JavaScript الخاص بـ Bootstrap من CDN -->
    <!-- داخل قسم <head> في ملف layouts/app.blade.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- داخل قسم <head> في ملف layouts/app.blade.php -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>
</html>
