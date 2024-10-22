<!DOCTYPE html>
<html lang="en">
<head>
    <!-- إضافة Bootstrap و Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* تنسيق التنقل */
        .navbar .dropdown-menu {
            left: auto;
            right: 0;
        }

        /* تنسيق أيقونة الإشعارات */
        .notification-icon {
            position: relative;
            cursor: pointer;
        }

        .notification-icon .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            font-size: 12px;
            padding: 4px 6px;
            border-radius: 50%;
        }

        /* تنسيق البطاقات */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
        }

        /* تخصيص ألوان الخلفية للبطاقات */
        .bg-custom-rooms {
            background-color: #007bff; /* أزرق */
        }

        .bg-custom-restaurants {
            background-color: #28a745; /* أخضر */
        }

        .bg-custom-pools {
            background-color: #17a2b8; /* تركواز */
        }

        .bg-custom-food-orders {
            background-color: #ffc107; /* أصفر */
        }

        .bg-custom-menus {
            background-color: #6f42c1; /* بنفسجي */
        }

        .bg-custom-reservations {
            background-color: #fd7e14; /* برتقالي */
        }

        /* تخصيص نمط الأيقونات */
        .icon {
            font-size: 2rem;
            margin-right: 10px;
        }

        /* تخصيص أزرار القسم */
        .action-button {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .action-button:hover {
            background-color: #d9534f;
            transform: translateY(-2px);
        }

        .action-button i {
            margin-right: 5px;
        }

        /* تحسين التباعد بين الأعمدة */
        .row > [class*='col-'] {
            margin-bottom: 15px;
        }

        /* تنسيق الأزرار */
        .btn-custom {
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            border: none;
            text-decoration: none;
        }

        .btn-custom i {
            margin-right: 8px;
            font-size: 1.2rem;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* ألوان الأزرار */
        .btn-logout {
            background-color: #dc3545; /* أحمر */
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .btn-profile {
            background-color: #007bff; /* أزرق */
        }

        .btn-profile:hover {
            background-color: #0056b3;
        }

        .btn-main-site {
            background-color: #28a745; /* أخضر */
        }

        .btn-main-site:hover {
            background-color: #218838;
        }

        .btn-info {
            background-color: #17a2b8; /* تركواز */
        }

        .btn-info:hover {
            background-color: #117a8b;
        }

        .btn-create-product {
            background-color: #ffc107; /* أصفر */
            color: #000;
        }

        .btn-create-product:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <!-- عرض رسائل الجلسة -->
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- قسم عرض الإحصائيات -->
    <div class="container mt-5">
        <div class="row text-center">
            <!-- بطاقة العملاء -->
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Customers<i class="fas fa-user-tie icon"></i></h5>
                        <p class="card-text">{{ $customerCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة المشرفين -->
            <div class="col-md-4">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Admins<i class="fas fa-user-shield icon"></i></h5>
                        <p class="card-text">{{ $adminCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة الموظفين -->
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Employees<i class="fas fa-users icon"></i></h5>
                        <p class="card-text">{{ $employeeCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة عدد الغرف -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-rooms">
                    <div class="card-body">
                        <h5 class="card-title">Number of Rooms <i class="fas fa-bed icon"></i></h5>
                        <p class="card-text">{{ $roomsCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة عدد المسابح -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-pools">
                    <div class="card-body">
                        <h5 class="card-title">Number of Pools <i class="fas fa-swimmer icon"></i></h5>
                        <p class="card-text">{{ $poolCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة عدد المطاعم -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-restaurants">
                    <div class="card-body">
                        <h5 class="card-title">Number of Restaurants<i class="fas fa-utensils icon"></i></h5>
                        <p class="card-text">{{ $restaurantCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة عدد طلبات الطعام -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-food-orders">
                    <div class="card-body">
                        <h5 class="card-title">Food Orders<i class="fas fa-concierge-bell icon"></i></h5>
                        <p class="card-text">{{ $foodOrderCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة عدد قوائم الطعام -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-menus">
                    <div class="card-body">
                        <h5 class="card-title">Menus<i class="fas fa-list-alt icon"></i></h5>
                        <p class="card-text">{{ $menuCount }}</p>
                    </div>
                </div>
            </div>

            <!-- بطاقة عدد الحجوزات -->
            <div class="col-md-4">
                <div class="card text-white bg-custom-reservations">
                    <div class="card-body">
                        <h5 class="card-title">Reservations<i class="fas fa-calendar-alt icon"></i></h5>
                        <p class="card-text">{{ $reservationCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- قسم الإجراءات -->
    <div class="container mt-4 text-center">
        @if(!(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin')))
            <div class="row justify-content-center">
                <!-- زر تسجيل الخروج -->
                <div class="col-md-2 mb-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-logout action-button" type="submit">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </button>
                    </form>
                </div>

                <!-- زر الموقع الرئيسي -->
                <div class="col-md-2 mb-4">
                    <a href="{{ url('/') }}" class="btn btn-main-site action-button">
                        <i class="fas fa-home"></i> Main Site
                    </a>
                </div>

                <!-- زر تقديم التوصية -->
                @if(Auth::user()->is_approved)
                    <div class="col-md-3 mb-4">
                        <a href="{{ url('/backend/restaurants') }}" class="btn btn-main-site action-button">
                            <i class="fas fa-heart"></i> Get Recommend
                        </a>
                    </div>
                @else
                    <div class="col-md-3 mb-4">
                        <button class="btn btn-secondary action-button" disabled>
                            <i class="fas fa-heart"></i> Get Recommend
                        </button>
                        <p class="text-danger mt-2">Your account is pending approval.</p>
                    </div>
                @endif

                <!-- زر معلوماتي -->
                <div class="col-md-2 mb-4">
                    <a href="{{ route('passengers.showByUserId', ['userId' => Auth::user()->id]) }}" class="btn btn-info action-button">
                        <i class="fas fa-info-circle"></i> My Info
                    </a>
                </div>

                <!-- زر إنشاء الحجز -->
                <div class="col-md-4 mb-12">
                    <a href="{{ route('passengers.create') }}" class="btn btn-create-booking action-button">
                        <i class="fas fa-calendar-plus"></i> Create Booking
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- قسم إضافة العناصر -->
    <div class="container mt-4 text-center">
        @if(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin'))
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <i class="fas fa-utensils icon"></i>
                    <a href="{{ route('reservations.create') }}" class="btn btn-warning btn-block action-button">
                        Create reservations
                    </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-bed icon"></i>
                    <a href="{{ route('rooms.create') }}" class="btn btn-info btn-block action-button">
                        Create rooms
                    </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-utensils icon"></i>
                    <a href="{{ route('restaurants.create') }}" class="btn btn-primary btn-block action-button">
                        Create Restaurant
                    </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-swimmer icon"></i>
                    <a href="{{ route('pools.create') }}" class="btn btn-main-site action-button">
                        Create pools
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-2">
                    <a href="{{ url('/') }}" class="btn btn-success btn-block action-button">
                        <i class="fas fa-home"></i> Site
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('menus.create') }}" class="btn btn-success btn-block action-button">
                        <i class="fas fa-list"></i> Create menus
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('food_orders.create') }}" class="btn btn-danger btn-block action-button">
                        <i class="fas fa-box"></i> Create food_orders
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- إضافة Bootstrap و Font Awesome JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
