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
      <!-- Logistics Menus- Default (Active Open)  -->
      <li class="menu-item active open">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-truck"></i>
          <div data-i18n="LOGISTICS">LOGISTICS</div>
        </a>
        <ul class="menu-sub">

          <x-active-menu-items :active="request()->is('logistics/activity-log')"></x-active-menu-items>
            <a  href="/logistics/activity-log"  class="menu-link"  >
          Activity Logs
            </a>
          </li>

          <x-active-menu-items :active="request()->is('logistics/fleet-items')"></x-active-menu-items>
          <a  href="/logistics/fleet-items"  class="menu-link"  >
         Manage Fleet
            </a>
        </li>

        </ul>
      </li>


      <li class="menu-item">  <!-- Logistics Sub Menus- (Active Not Open)  -->
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='menu-icon ti ti-table'></i>
          <div data-i18n="INVENTORY">INVENTORY</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="#" class="menu-link">
              <div data-i18n="Send Message">Category</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link menu-toggle">
              <div data-i18n="Messaging Channel">Items</div>
            </a>
          </li>

            </ul>
          </li>

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='menu-icon tf-icons ti ti-file-description'></i>
          <div data-i18n="REPORTS">REPORTS</div>
        </a>
        <ul class="menu-sub">
            <x-active-menu-items :active="request()->is('logistics/reports')"></x-active-menu-items>
            <a  href="/logistics/reports"  class="menu-link"  >
              <div data-i18n="Send Daily Reports">Send Daily Reports</div>
            </a>
          </li>
          <x-active-menu-items :active="request()->is('logistics/report-history')"></x-active-menu-items>
          <a  href="/logistics/report-history"  class="menu-link"  >
              <div data-i18n="Report History">Report History</div>
            </a>
          </li>
            </ul>
          </li>


          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon ti ti-messages'></i>
              <div data-i18n="MESSAGING">MESSAGING</div>
            </a>
            <ul class="menu-sub">
                <x-active-menu-items :active="request()->is('logistics/system-messages')"></x-active-menu-items>
                <a  href="/logistics/system-messages"  class="menu-link"  >
                  <div data-i18n="Send Daily Reports">Send Message</div>
                </a>
              </li>
              <x-active-menu-items :active="request()->is('logistics/message-history')"></x-active-menu-items>
              <a  href="/logistics/message-history"  class="menu-link"  >
                  <div data-i18n="Report History">Message History</div>
                </a>
              </li>
                </ul>
              </li>


        </ul>
      </li>




  </aside>
  <!-- / Logistics Menu -->
