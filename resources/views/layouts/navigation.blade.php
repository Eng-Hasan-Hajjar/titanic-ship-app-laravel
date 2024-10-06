<head>
    <!-- إضافة Bootstrap و Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* تخصيص نمط شريط التنقل */
        .navbar-custom {
            background-color: #ffffff; /* اللون الأبيض لشريط التنقل */
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* إضافة ظل للشريط */
            direction: ltr;
            text-align: left;
        }

        /* تخصيص نمط العناصر النشطة */
        .nav-link.active {
            font-weight: bold;
            color: #007bff !important;
            border-bottom: 2px solid #007bff; /* إضافة خط تحت العنصر النشط */
        }

        /* تخصيص نمط الإشعارات */
        .notification-icon {
            position: relative;
            cursor: pointer;
            margin-left: 20px; /* زيادة المسافة بين الإشعارات والعناصر الأخرى */
        }

        .notification-icon .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: #ff3d3d; /* تغيير لون شارة الإشعارات */
            color: white;
            font-size: 12px;
            padding: 4px 6px;
            border-radius: 50%;
        }

        /* تخصيص نمط البطاقات */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 2.5rem;
            font-weight: bold;
        }

        /* تخصيص نمط القائمة المنسدلة */
        .dropdown-menu {
            left: auto;
            right: 0;
            border-radius: 0px 0px 10px 10px; /* تحسين الشكل بتدوير الزوايا السفلية */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* إضافة ظل للقائمة */
        }

        .notifications-dropdown {
            max-height: 300px;
            overflow-y: auto;
        }

        /* تخصيص هامش للعناصر */
        .nav-item {
            margin-left: 15px;
        }
    </style>
</head>

<body>
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <!-- روابط شريط التنقل -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">


                    @if (Auth::user()->can('isAdmin'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">Category Management</a>
                        </li>
                    @endif

                    @if(Auth::user()->can('isCustomer'))
                        <!-- روابط العملاء -->
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">Product Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('facebook_pages.index') ? 'active' : '' }}" href="{{ route('facebook_pages.index') }}">Browse Facebook Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('instagram_accounts.index') ? 'active' : '' }}" href="{{ route('instagram_accounts.index') }}">Browse Instagram Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('youtube_channels.index') ? 'active' : '' }}" href="{{ route('youtube_channels.index') }}">Browse YouTube Channels</a>
                        </li>


                    @endif

                    <li class="nav-item">
                    </li>
                </ul>

                <!-- إشعارات -->
                @if(!(Auth::user()->can('isEmployee') || Auth::user()->can('isAdmin')))
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown notification-icon">
                            <a class="nav-link" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                @if(Auth::user()->unreadNotifications->count())
                                    <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right notifications-dropdown" aria-labelledby="notificationsDropdown">
                                <h6 class="dropdown-header">Notifications</h6>
                                @forelse(Auth::user()->notifications as $notification)
                                    <a href="#" class="dropdown-item">
                                        {{ $notification->data['message'] }}
                                        <br><small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </a>
                                @empty
                                    <p class="text-center">No new notifications</p>
                                @endforelse
                            </div>
                        </li>
                    </ul>
                @endif
            </div>


        </div>
    </nav>

    <!-- إضافة Bootstrap و Font Awesome JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
