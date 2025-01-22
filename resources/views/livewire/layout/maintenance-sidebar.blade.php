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
          <div data-i18n="MAINTENANCE">MAINTENANCE</div>
        </a>
        <ul class="menu-sub">

            <x-active-menu-items :active="request()->is('maintenance/asset')"></x-active-menu-items>
            <a href="/maintenance/asset" wire:navigate class="menu-link" >
          Assets
            </a>
          </li>

          <x-active-menu-items :active="request()->is('maintenance/asset-cat')"></x-active-menu-items>
            <a href="/maintenance/asset-cat" wire:navigate class="menu-link" >
          Assets Category
            </a>
          </li>
          <x-active-menu-items :active="request()->is('maintenance/request-maintenance')"></x-active-menu-items>
            <a href="/maintenance/request-maintenance" wire:navigate class="menu-link">
                Request Maintenance
            </a>
          </li>
          <x-active-menu-items :active="request()->is('maintenance/history')"></x-active-menu-items>
            <a  href="/maintenance/history"  class="menu-link">
                Maintenance History
            </a>
          </li>
          <x-active-menu-items :active="request()->is('maintenance/schedules')"></x-active-menu-items>
          <a href="/maintenance/schedules" class="menu-link">
            Maintenance Schedules
            </a>
          </li>
        </ul>
        </li>




          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon ti ti-messages'></i>
              <div data-i18n="INVENTORY">INVENTORY</div>
            </a>
            <ul class="menu-sub">

                <x-active-menu-items :active="request()->is('maintenance/inventory-cat')"></x-active-menu-items>
                <a href="/maintenance/inventory-cat" class="menu-link">
                    Inventory Categories
                </a>
                </li>
                <x-active-menu-items :active="request()->is('maintenance/inventories')"></x-active-menu-items>
                <a href="/maintenance/inventories" class="menu-link">
                Inventory
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
              <a  href="/logistics/reports"  class="menu-link" wire:navigate >
                <div data-i18n="Send Daily Reports">Send Daily Reports</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <div data-i18n="Reporting Channel">Reporting Channel</div>
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
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Send Message">Send Messages</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Messaging Channel">Messaging Channel</div>
                  </a>
                </li>

                  </ul>
                </li>



    </ul>
  </li>




  </aside>
  <!-- / Menu -->
