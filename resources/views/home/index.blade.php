<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Fams</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;

            background-color: #87ceeb;
            padding: 10px 20px;
        }

        header .brand {
            font-size: 24px;
            font-weight: bold;
            align-items: center;
            color: #f351c5;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            background-color: #faf2f8;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-top: 20px;
            background-color: #f7e1f1;
        }

        .brand img {
            height: 50px;
        }

        .profile-buttons {
            display: flex;
            justify-content: space-around;
            padding: 10px;
            background-color: #f351c5;
            color: #fff;
        }

        .profile-buttons button {
            background: none;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            position: relative;
            padding: 5px 10px;
        }
        .profile-buttons button:hover,
        .profile-buttons button.active {
            color: #fff;
        }

        .profile-buttons button::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background-color: #f5adf6;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transition: width 0.3s ease, left 0.3s ease;
        }

        .profile-buttons button:hover::after,
        .profile-buttons button.active::after {
            width: 100%;
            left: 0;
        }

        .profile-buttons .cart-button {
            display: flex;
            align-items: center;
            position: relative;
        }

        .profile-buttons .cart-button button {
            padding-right: 30px; /* Space for cart count */
        }

        .profile-buttons .cart-button span {
            position: absolute;
            right: 10px;
            top: 20px;
            background-color: #ff0000;
            color: #fff;
            padding: 2px 5px;
            border-radius: 50%;
            font-size: 14px;
        }


        main {
            padding: 20px;
        }

        .left-section {
            text-align: center;
        }

        .latest-products h2
        {
            font-size: 24px;
            font-weight: bold;
            align-items: center;
            color: #f351c5;
        }
        .detail-box {
            margin-top: 10px;
            text-align: left; /* Align text to the left */
        }
        .detail-box h6 {
            margin: 5px 0;
            color: #333;
        }
        .detail-box span {
        color: #f351c5;
    }
        .btn-danger {
            display: block;
            padding: 10px;
            margin-top: 10px;
            color: #fff;
            background-color: #dc3545;
            border: 1px solid #dc3545;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
            text-align: center;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .categories {
            margin: 20px 0;
        }

        .categories h2 {
            margin-bottom: 10px;
        }

        .categories button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #ddd;
            cursor: pointer;
            margin: 5px;
        }
        .product-list {
            display: flex;
            overflow-x: auto;
        }

        .product {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            min-width: 200px;
            flex-direction: column;
            text-align: center;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 10px;
            margin-right: 10px;
        }

        .product img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #f2e0ec;
            text-align: left;
            flex-wrap: wrap;
        }

        .footer .map,
        .footer .contact-info {
            flex: 1;
            padding: 10px;
            margin: 10px;
        }

        .footer .map iframe {
            width: 400px;
            height: 300px;
            border: 0;
        }

        .footer .contact-info {
            font-size: 18px;
        }

        .footer .contact-info p {
            margin: 10px 0;
        }

        .footer h4 {
            margin-top: 0;
        }
        .brand
        {
            color: #e35eb0;
            text-align: center;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 7px;
            margin-top: 10px;
            font-size: 1rem;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            text-decoration: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 .2rem rgba(38,143,255,.5);
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0062cc;
            border-color: #005cbf;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="brand">Healty Fams</div>
        </header>
        <div class="profile-buttons">
            <button>Home</button>
            <button>Shop</button>
            <button>Why Us</button>

            @if (Route::has('login'))
                @auth

                <div class="cart-button">
                    <a href="{{url('mycart')}}">
                    <button>🛒</button>
                    <span>{{$count}}</span>
                    </a>
                </div>

                    <form style="padding: 15px" method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <input class="btn btn-success" type="submit" value="Logout">
                    </form>
                @else
                    <button onclick="location.href='{{ route('login') }}'">Login</button>
                    <button onclick="location.href='{{ route('register') }}'">Register</button>
                @endauth
            @endif
            
        </div>
        <main>
            <div class="left-section">
                <h1>We Care About Your Health</h1>
                <section class="latest-products">
                    
                    
                    <h2>Products</h2> 
                    <div class="product-list">
                        @foreach ($product as $products)
                            <div class="product">
                                <img src="products/{{ $products->image }}" alt="">
                                <div class="detail-box">
                                    <h6>{{ $products->title }}</h6>
                                    <h6>Price :
                                        <span>{{ $products->price }}</span>
                                <div>
                                    <a class="btn btn-danger" href="{{url('product_details',$products->id)}}" >Details</a>

                                    <a class="btn btn-primary" href="{{url('add_cart',$products->id )}}">Add to Cart</a>
                                </div>        

                                    </h6>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    
                </section>
            </div>
        </main>
        <div class="footer">
            <div class="map">
                <h4>Alamat Apotek</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.433072671008!2d101.36045422304935!3d0.45805540754227356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a83e6aac3a21%3A0x45e2a9439c17e2b5!2sJl.%20Yuda%20Karya%2C%20Tuah%20Karya%2C%20Kec.%20Tampan%2C%20Kota%20Pekanbaru%2C%20Riau%2028293%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1625230913794!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contact-info">
                <h4>Contact Us</h4>
                <p>Nama: Healthy Fams</p>
                <p>Email: info@healthyfams.com</p>
                <p>Alamat: Jl. Yudha Karya, Pekanbaru</p>
                <p>Telepon: (021) 12345678</p>
            </div>
        </div>
    </div>
</body>

</html>