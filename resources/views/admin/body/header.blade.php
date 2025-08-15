  
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('backend/assets/images/logo-sm.png')}}" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('backend/assets/images/logo-light.png')}}" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                       
                      
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="{{asset('backend/assets/images/flags/us.jpg')}}" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('backend/assets/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('backend/assets/images/flags/germany.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('backend/assets/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('backend/assets/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                                <div class="px-lg-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('backend/assets/images/brands/github.png')}}" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('backend/assets/images/brands/bitbucket.png')}}" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('backend/assets/images/brands/dribbble.png')}}" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('backend/assets/images/brands/dropbox.png')}}" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('backend/assets/images/brands/mail_chimp.png')}}" alt="mail_chimp">
                                                <span>Mail Chimp</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="#">
                                                <img src="{{asset('backend/assets/images/brands/slack.png')}}" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>
                      
                        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        
                        <script>
                            // Enable Pusher logging - don't include this in production
                            Pusher.logToConsole = true;
                        
                            var pusher = new Pusher('334a87a9d75afb6b085d', {
                                cluster: 'ap2'
                            });
                        
                            var channel = pusher.subscribe('admin-channel');
                            var notificationCount = 0;
                        
                            channel.bind('admin-event', function(data) {
                                console.log(data);  // Log the entire data object to inspect its structure
                                
                                // If data is an object containing user details, directly use it
                                if (data.name && data.total_price && data.created_at) {
                                    let notificationHtml = `
                                        <a href="#" class="text-reset notification-item">
                                            <div class="d-flex">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mb-1">New Order from ${data.name}</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">Total Price: ${data.total_price} Rs</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ${data.created_at}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    `;
                                    
                                    $('#notification-list').prepend(notificationHtml);  // Add notification to the top of the list
                                    notificationCount += 1;  // Increase the notification count
                                    updateNotificationCount();  // Update the displayed notification count
                                } else if (Array.isArray(data)) {
                                    // If data is an array, iterate over each item
                                    $.each(data, function(index, user) {
                                        console.log(user);  // Log each user object for debugging
                                        
                                        let notificationHtml = `
                                            <a href="#" class="text-reset notification-item">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                            <i class="ri-shopping-cart-line"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-1">New Order from ${user.name}</h6>
                                                        <div class="font-size-12 text-muted">
                                                            <p class="mb-1">Total Price: ${user.total_price} Rs</p>
                                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ${user.created_at}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        `;
                                        
                                        $('#notification-list').prepend(notificationHtml);  // Add notification to the list
                                        notificationCount += 1;  // Increase the notification count
                                    });
                        
                                    updateNotificationCount();  // Update the displayed notification count
                                } else {
                                    console.error('Unexpected data format:', data);
                                }
                            });
                        
                            function updateNotificationCount() {
                                const notiDot = document.querySelector('.noti-dot');
                                if (notificationCount > 0) {
                                    notiDot.style.display = 'inline-block';  // Ensure it's visible
                                    notiDot.innerText = notificationCount;   // Set the notification count text
                                } else {
                                    notiDot.style.display = 'none';  // Hide if no notifications
                                }
                            }
                        
                            // Reset notification count when dropdown is clicked
                            $(document).ready(function() {
                                $('#page-header-notifications-dropdown').on('click', function() {
                                    notificationCount = 0;  // Reset counter
                                    updateNotificationCount();  // Update display
                                });
                            });
                        </script>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ri-notification-3-line"></i>
                          <span class="noti-dot" style="display: none;"></span> <!-- Initially hidden -->
                        </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;" id="notification-list">
                                   
                                   
                                

                                   
                                </div>
                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('backend/assets/images/users/avatar-1.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{auth()->check()?auth()->user()->name:''}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{route('adminLogout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>
                        
            
                    </div>
                </div>
            </header>