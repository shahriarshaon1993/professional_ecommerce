        <div class="sl-logo"><a href="{{ url('admin/home')}}"><i class="icon ion-android-star-outline"></i> Professional</a></div>

        <div class="sl-sideleft">
            <div class="sl-sideleft-menu">

                <a href="{{ url('admin/home')}}" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

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

                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                        <span class="menu-item-label">Others</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div><!-- menu-item -->
                </a><!-- sl-menu-link -->

                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.newslater') }}" class="nav-link">Newslater</a></li>
                </ul>
            </div><!-- sl-sideleft-menu -->

            <br>

        </div><!-- sl-sideleft -->