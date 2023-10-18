 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->
         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('login') }}" class="waves-effect">
                         <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                         <span>Dashboard</span>
                     </a>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage suppliers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('supplier.all') }}">all supliers</a></li>
                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Customers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('customer.all') }}">All Customers</a></li>
                         <li><a href="{{ route('credit.customer') }}">Credit Customers</a></li>
                         <li><a href="{{ route('paid.customer') }}">Paid Customers</a></li>
                         <li><a href="{{ route('customer.wise.report') }}">Customer Wise Report</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage unit</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('unit.all') }}">All unit</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Category</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('category.all') }}">All Category</a></li>
                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Products</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('product.all') }}">All Products</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Purchases</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('purchase.all') }}">All Purchases</a></li>
                         <li><a href="{{ route('purchase.pending') }}">Aproval Purchases</a></li>
                         <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
                     </ul>
                 </li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-mail-send-line"></i>
                         <span>Manage Invoice</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('invoice.all') }}">All Invoice</a></li>
                         <li><a href="{{ route('invoice.pending.list') }}">Aproval Invoice</a></li>
                         <li><a href="{{ route('print.invoice.list') }}">Print Invoice List</a></li>
                         <li><a href="{{ route('daily.invoice.report') }}">Dail Invoice Report</a></li>
                     </ul>
                 </li>






                 <li class="menu-title">Stock</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-account-circle-line"></i>
                         <span>Manage Stock</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('stock.report') }}">Stock Report</a></li>
                         <li><a href="{{ route('stock.supplier.wise') }}">Supplier / Product Wise </a></li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-profile-line"></i>
                         <span>Utility</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="pages-starter.html">Starter Page</a></li>
                         <li><a href="pages-timeline.html">Timeline</a></li>
                         <li><a href="pages-directory.html">Directory</a></li>
                         <li><a href="pages-invoice.html">Invoice</a></li>
                         <li><a href="pages-404.html">Error 404</a></li>
                         <li><a href="pages-500.html">Error 500</a></li>
                     </ul>
                 </li>



             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
