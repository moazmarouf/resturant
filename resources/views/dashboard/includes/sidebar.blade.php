<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="" class="media-left"><img src="" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"></span>
                        <div class="text-size-mini text-muted">
                            <i class=" icon-briefcase3 text-size-small"></i> &nbsp;
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href=""><i class="icon-switch2"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->


                    <li {{Request::is('admin') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-tachometer" aria-hidden="true"></i> <span>الرئيسيه</span></a>
                    </li>

                    <li {{Request::is('admin/settings*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-cogs" aria-hidden="true"></i> <span>الاعدادات الرئيسيه</span></a>
                    </li>

                    <li {{Request::is('admin/messages*') ? 'class=active' :''}}>
                        <a href=""><i class="icon-bubbles4" aria-hidden="true"></i> <span>الرسائل</span></a>
                    </li>

                    <li {{Request::is('admin/complains*') ? 'class=active' :''}}>
                        <a href=""><i class="icon-bubbles4" aria-hidden="true"></i> <span>الشكاوي والاقتراحات</span></a>
                    </li>

                    <li {{Request::is('admin/admins*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-user-secret" aria-hidden="true"></i> <span>المديرين</span></a>
                    </li>

                    <li {{Request::is('admin/users*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-user" aria-hidden="true"></i> <span>المستخدمين</span></a>
                    </li>

                    <li {{Request::is('admin/sliders*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>الأقسام الرئيسيه</span></a>
                    </li>

                    <li {{Request::is('admin/categories*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>المنيوهات</span></a>
                    </li>

                    <li {{Request::is('admin/products*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>المنتجات</span></a>
                    </li>

                    <li {{Request::is('admin/orders*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>الطلبات</span></a>
                    </li>

                    <li {{Request::is('admin/faq*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-question-circle" aria-hidden="true"></i> <span>الأسئله المتكرره</span></a>
                    </li>

                    <li {{Request::is('admin/banks*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>الحسابات البنكيه</span></a>
                    </li>

                    <li {{Request::is('admin/reservations*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>الحجوزات</span></a>
                    </li>

                    <li {{Request::is('admin/tables*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>الطاولات</span></a>
                    </li>

                    <li {{Request::is('admin/rooms*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>الغرف</span></a>
                    </li>

                    <li {{Request::is('admin/occations*') ? 'class=active' :''}}>
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i> <span>المناسبات</span></a>
                    </li>

                    <li {{Request::is('admin/permissions*') ? 'class=active' :''}}>
                        <a href="#"><i class="icon-briefcase3"></i> <span>الصلاحيات</span></a>
                        <ul>
                            <li><a href="">عرض</a></li>
                            <li><a href="">اضافه جديد</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar
