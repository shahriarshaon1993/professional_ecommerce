        <div class="sl-logo"><a href="{{ url('admin/home')}}"><i class="icon ion-android-star-outline"></i> Professional</a></div>

        <div class="sl-sideleft">
            <div class="sl-sideleft-menu">

                <a href="{{ url('admin/home')}}" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                @if (Auth::user()->category == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                            <span class="menu-item-label">Categories</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link">Category</a></li>
                        <li class="nav-item"><a href="{{ route('sub.categories') }}" class="nav-link">Sub Category</a></li>
                        <li class="nav-item"><a href="{{ route('brands') }}" class="nav-link">Brands</a></li>
                    </ul>
                @endif

                @if (Auth::user()->coupon == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                            <span class="menu-item-label">Coupons</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('admin.coupons') }}" class="nav-link">Coupon</a></li>
                    </ul>
                @endif

                @if (Auth::user()->product == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                            <span class="menu-item-label">Product</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('add.product') }}" class="nav-link">Add Product</a></li>
                        <li class="nav-item"><a href="{{ route('all.product') }}" class="nav-link">All Product</a></li>
                    </ul>
                @endif

                @if (Auth::user()->orders == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                            <span class="menu-item-label">Order</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('admin.neworder') }}" class="nav-link">New Order</a></li>
                        <li class="nav-item"><a href="{{ route('admin.accept.payment') }}" class="nav-link">Accept Payment</a></li>
                        <li class="nav-item"><a href="{{ route('admin.cancel.order') }}" class="nav-link">Cancel Order</a></li>
                        <li class="nav-item"><a href="{{ route('admin.process.payment') }}" class="nav-link">Process Delivery</a></li>
                        <li class="nav-item"><a href="{{ route('admin.success.payment') }}" class="nav-link">Delivery Success</a></li>
                    </ul>
                @endif

                @if (Auth::user()->blog == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                            <span class="menu-item-label">Blog</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('post.category') }}" class="nav-link">Post Category</a></li>
                        <li class="nav-item"><a href="{{ route('add.post') }}" class="nav-link">Add Post</a></li>
                        <li class="nav-item"><a href="{{ route('all.post') }}" class="nav-link">All Post</a></li>
                    </ul>
                @endif

                @if (Auth::user()->other == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Others</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('admin.newslater') }}" class="nav-link">Newslater</a></li>
                        <li class="nav-item"><a href="{{ route('admin.seo') }}" class="nav-link">SEO Setting</a></li>
                    </ul>
                @endif

                @if (Auth::user()->report == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Reports</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('today.order') }}" class="nav-link">Today Orders</a></li>
                        <li class="nav-item"><a href="{{ route('today.delivery') }}" class="nav-link">Today Delivery</a></li>
                        <li class="nav-item"><a href="{{ route('this.month') }}" class="nav-link">This Month</a></li>
                        <li class="nav-item"><a href="{{ route('search.report') }}" class="nav-link">Search Report</a></li>
                    </ul>
                @endif

                @if (Auth::user()->role == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">User Role</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('create.admin') }}" class="nav-link">Create User</a></li>
                        <li class="nav-item"><a href="{{ route('admin.all.user') }}" class="nav-link">All User</a></li>
                    </ul>
                @endif

                @if (Auth::user()->returns == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Return Order</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('admin.return.request') }}" class="nav-link">Return Request</a></li>
                        <li class="nav-item"><a href="{{ route('admin.return.all') }}" class="nav-link">All Request</a></li>
                    </ul>
                @endif

                @if (Auth::user()->contact == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Contact Message</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="" class="nav-link">New Message</a></li>
                        <li class="nav-item"><a href="" class="nav-link">All Message</a></li>
                    </ul>
                @endif

                @if (Auth::user()->comment == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Product Comments</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="" class="nav-link">New Comment</a></li>
                        <li class="nav-item"><a href="" class="nav-link">All Comments</a></li>
                    </ul>
                @endif

                @if (Auth::user()->settings == 1)
                    <a href="#" class="sl-menu-link">
                        <div class="sl-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Site Setting</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->

                    <ul class="sl-menu-sub nav flex-column">
                        <li class="nav-item"><a href="{{ route('admin.site.setting') }}" class="nav-link">Site Setting</a></li>
                    </ul>
                @endif
            </div><!-- sl-sideleft-menu -->

            <br>

        </div><!-- sl-sideleft -->
