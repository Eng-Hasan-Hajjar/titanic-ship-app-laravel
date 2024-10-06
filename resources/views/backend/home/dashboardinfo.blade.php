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
        .bg-facebook {
            background-color: #3b5998;
        }

        .bg-instagram {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 50%, #d6249f 75%, #285AEB 100%);        }

        .bg-youtube {
            background-color: #ff0000;
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

            <!-- بطاقات مواقع التواصل الاجتماعي -->
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title"> Number of rooms <i class="fas fa-bed icon"></i></h5>
                        <p class="card-text">{{ $facebookPageCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Number of pools <i class="fas fa-swimmer icon"></i></h5>
                        <p class="card-text">{{ $instagramAccountCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Number of restaurants<i class="fas fa-utensils icon"></i></h5>
                        <p class="card-text">{{ $youtubeChannelCount }}</p>
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
                    <i class="fas fa-sign-out-alt"></i>
                    <button class="btn btn-logout action-button" type="submit">
                        Log Out
                    </button>
                </form>
            </div>

            <!-- زر الموقع الرئيسي -->
            <div class="col-md-2 mb-4">
                <i class="fas fa-home"></i>
                <a href="{{ url('/') }}" class="btn btn-main-site action-button">
                    Main Site
                </a>
            </div>

            <!-- زر تقديم التوصية  -->

            @if(Auth::user()->is_approved)
                <div class="col-md-3 mb-4">
                    <i class="fas fa-heart"></i>
                    <a href="{{ url('/backend/recommendations') }}" class="btn btn-main-site action-button">
                        get recommend
                    </a>
                </div>
            @else
                <div class="col-md-3 mb-4">
                    <i class="fas fa-heart"></i>
                    <button class="btn btn-secondary action-button" disabled>
                        get recommend
                    </button>
                    <p class="text-danger mt-2">Your account is pending approval.</p>
                </div>
            @endif



                <!-- زر معلوماتي -->
            <div class="col-md-2 mb-4">
                <i class="fas fa-info-circle"></i>
                <a href="{{ route('customers.showByUserId', ['userId' => Auth::user()->id]) }}" class="btn btn-info action-button">
                    My Info
                </a>
            </div>
            <!-- زر إنشاء المنتجات -->
            <div class="col-md-4 mb-12">
                <i class="fas fa-box-open"></i>
                <a href="{{ route('products.create') }}" class="btn btn-create-product action-button">
                    Create
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
                    <a href="{{ route('youtube_channels.create') }}" class="btn btn-warning btn-block action-button">
                        Create </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-bed  icon"></i>
                    <a href="{{ route('instagram_accounts.create') }}" class="btn btn-info btn-block action-button">
                        Create </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-utensils icon"></i>
                    <a href="{{ route('facebook_pages.create') }}" class="btn btn-primary  btn-block action-button">
                        Create  </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-swimmer icon"></i>
                    <a href="{{ url('/backend/recommendations') }}" class="btn btn-main-site action-button">
                        Get recommend
                     </a>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-md-2">
                    <i class="fas fa-home "></i>
                    <a href="{{ url('/') }}" class="btn btn-success btn-block action-button">Site</a>
                </div>
                <div class="col-md-2">
                    <i class=" fas fa-list"></i>
                    <a href="{{ route('categories.create') }}" class="btn btn-success btn-block action-button">Create </a>
                </div>
                <div class="col-md-2">
                    <i class=" fas fa-box"></i>
                    <a href="{{ route('products.create') }}" class="btn btn-danger btn-block action-button">Create </a>
                </div>
            </div>

        @endif
    </div>
    <style>
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

        .action-button {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* تحسين التباعد بين الأعمدة */
        .row > [class*='col-'] {
            margin-bottom: 15px;
        }
    </style>


    <!-- إضافة Bootstrap و Font Awesome JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
