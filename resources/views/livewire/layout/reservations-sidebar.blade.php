<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
      <a href="index-2.html" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0" />
            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0" />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Hotelis</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
      <!-- Dashboard Menus -->
      <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="RESERVATIONS">RESERVATIONS</div>
        </a>
        <ul class="menu-sub">

          <x-active-menu-items :active="request()->is('reservations/home-create-rooms')"></x-active-menu-items>
            <a href="/reservations/home-create-rooms" wire:navigate class="menu-link" >
          Rooms
            </a>
          </li>
          <x-active-menu-items :active="request()->is('reservations/home-create-room-category')"></x-active-menu-items>
            <a href="/reservations/home-create-room-category" wire:navigate class="menu-link">
            Room Category
            </a>
          </li>
          <x-active-menu-items :active="request()->is('reservations/home-create-room-allocation')"></x-active-menu-items>
            <a  href="/reservations/home-create-room-allocation"  class="menu-link">
          Rooms Allocations
            </a>
          </li>
          <x-active-menu-items :active="request()->is('reservations/available-rooms')"></x-active-menu-items>
          <a href="/reservations/available-rooms" class="menu-link">
          Available Rooms
            </a>
          </li>
          <x-active-menu-items :active="request()->is('reservations/reservations')"></x-active-menu-items>
            <a href="/reservations/reservations" class="menu-link">
          Book a Room
            </a>
          </li>
          <x-active-menu-items :active="request()->is('reservations/reserved-rooms')"></x-active-menu-items>
          <a href="/reservations/reserved-rooms" class="menu-link">
        Reserved Rooms
          </a>
        </li>
        <x-active-menu-items :active="request()->is('reservations/due-rooms')"></x-active-menu-items>
        <a href="/reservations/due-rooms" class="menu-link">
      Due Rooms
        </a>
      </li>
      <x-active-menu-items :active="request()->is('reservations/due-rooms')"></x-active-menu-items>
      <a href="/reservations/due-rooms" class="menu-link">
    Room Checkouts
      </a>
    </li>
      <x-active-menu-items :active="request()->is('')"></x-active-menu-items>
      <a href="#" class="menu-link">
    Verify Reservation ID
      </a>
    </li>
    <x-active-menu-items :active="request()->is('')"></x-active-menu-items>
    <a href="#" class="menu-link">
  Abandoned Reservations
    </a>
  </li>
      <x-active-menu-items :active="request()->is('reservations/reservation-feeds')"></x-active-menu-items>
      <a href="/reservations/reservation-feeds" class="menu-link">
    Reservation Feeds
      </a>
    </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='menu-icon tf-icons ti ti-shopping-cart'></i>
          <div data-i18n="eCommerce">eCommerce</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="app-ecommerce-dashboard.html" class="menu-link">
              <div data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Products">Products</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="app-ecommerce-product-list.html" class="menu-link">
                  <div data-i18n="Product List">Product List</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-product-add.html" class="menu-link">
                  <div data-i18n="Add Product">Add Product</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-category-list.html" class="menu-link">
                  <div data-i18n="Category List">Category List</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Order">Order</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="app-ecommerce-order-list.html" class="menu-link">
                  <div data-i18n="Order List">Order List</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-order-details.html" class="menu-link">
                  <div data-i18n="Order Details">Order Details</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Customer">Customer</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="app-ecommerce-customer-all.html" class="menu-link">
                  <div data-i18n="All Customers">All Customers</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <div data-i18n="Customer Details">Customer Details</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="app-ecommerce-customer-details-overview.html" class="menu-link">
                      <div data-i18n="Overview">Overview</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="app-ecommerce-customer-details-security.html" class="menu-link">
                      <div data-i18n="Security">Security</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="app-ecommerce-customer-details-billing.html" class="menu-link">
                      <div data-i18n="Address & Billing">Address & Billing</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="app-ecommerce-customer-details-notifications.html" class="menu-link">
                      <div data-i18n="Notifications">Notifications</div>
                    </a>
                  </li>

                </ul>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="app-ecommerce-manage-reviews.html" class="menu-link">
              <div data-i18n="Manage Reviews">Manage Reviews</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="app-ecommerce-referral.html" class="menu-link">
              <div data-i18n="Referrals">Referrals</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="app-ecommerce-settings-detail.html" class="menu-link">
                  <div data-i18n="Store Details">Store Details</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-settings-payments.html" class="menu-link">
                  <div data-i18n="Payments">Payments</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-settings-checkout.html" class="menu-link">
                  <div data-i18n="Checkout">Checkout</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-settings-shipping.html" class="menu-link">
                  <div data-i18n="Shipping & Delivery">Shipping & Delivery</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-settings-locations.html" class="menu-link">
                  <div data-i18n="Locations">Locations</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-ecommerce-settings-notifications.html" class="menu-link">
                  <div data-i18n="Notifications">Notifications</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>




  </aside>
  <!-- / Menu -->
