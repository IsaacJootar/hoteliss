<?php
use App\Livewire\HomePage;
use App\Livewire\LoginUser;
use App\Livewire\AuthRegister;
use App\Livewire\Logistics\Fleet;
use App\Livewire\Logistics\Reports;
use App\Livewire\General\SystemRoles;
use Illuminate\Support\Facades\Route;
use App\Livewire\Logistics\FleetItems;
use App\Livewire\General\HotelSections;
use App\Livewire\Logistics\ActivityLog;
use App\Livewire\Reservations\DueRooms;
use App\Livewire\Logistics\ReportHistory;
use App\Livewire\General\GeneralDashboard;
use App\Livewire\Logistics\MessageHistory;
use App\Livewire\Logistics\SystemMessages;
use App\Livewire\Reservations\CreateRooms;
use App\Livewire\General\CreateuserAccount;
use App\Http\Middleware\RoleRedirectMiddleware;



/////////////////////////  Routes for the Maintenance Module  ///////////////////////////

use App\Livewire\Reservations\Reservations;
use App\Livewire\Reservations\ReservedRooms;
use App\Livewire\Reservations\AvailableRooms;
use App\Livewire\Reservations\CheckedoutRooms;
use App\Livewire\Reservations\HomeCreateRooms;
use App\Livewire\Reservations\ReservationFeeds;
use App\Livewire\Reservations\CreateReservation;
use App\Livewire\Reservations\UpdateReservation;
use App\Livewire\Reservations\CreateRoomCategory;
use App\Livewire\Reservations\CheckoutReservation;
use App\Livewire\Reservations\CreateRoomAllocation;
use App\Livewire\Reservations\HomeCreateRoomCategory;
use App\Livewire\Reservations\HomeCreateRoomAllocation;
use App\Http\Controllers\PaymentController; //handle Payment API(paystack)
use App\Livewire\LogoutButton;
use App\Livewire\Reservations\RoomSwap;

Route::get('/auth-register', AuthRegister::class);
route::get('/login-user', LoginUser::class)->name('login-user');
route::get('/logout-button', LogoutButton::class)->name('logout-button');
// RESERVATIONS MODULE ROUTES (FD Role)
Route::middleware(['auth', 'role.redirect'])->prefix('reservations')->group(function () {
    Route::get('/reservations', Reservations::class)->name('reservations');
    Route::get('/create-reservation/{category_id}/{nor}/{checkin}/{checkout}', CreateReservation::class)->name('create-reservation');
    Route::get('/checkout-reservation/{reservation_id}', CheckoutReservation::class)->name('checkout-reservation');
    Route::get('/update-reservation/{reservation_id}', UpdateReservation::class)->name('update-reservation');
    Route::get('/create-rooms', CreateRooms::class)->name('create-rooms');
    Route::get('/home-create-rooms', HomeCreateRooms::class)->name('home-create-rooms');
    Route::get('/create-room-allocation', CreateRoomAllocation::class)->name('create-room-allocation');
    Route::get('/home-create-room-allocation', HomeCreateRoomAllocation::class)->name('home-create-room-allocation');
    Route::get('/create-room-category', CreateRoomCategory::class)->name('home-room-category');
    Route::get('/home-create-room-category', HomeCreateRoomCategory::class)->name('home-create-room-category');
    Route::get('/available-rooms', AvailableRooms::class)->name('available-rooms');
    Route::get('/reserved-rooms', ReservedRooms::class)->name('reserved-rooms');
    Route::get('/due-rooms', DueRooms::class)->name('due-rooms');
    Route::get('/room-swap', RoomSwap::class)->name('room-swap')->name('room-swap');
    Route::get('/checkedout-rooms', CheckedoutRooms::class)->name('checkedout-rooms');
    Route::get('/reservation-feeds', ReservationFeeds::class)->name('reservation-feeds');
});

// LOGISTICS MODULE ROUTES (LG Role)
Route::middleware(['auth', 'role.redirect'])->prefix('logistics')->group(function () {
    Route::get('/activity-log', ActivityLog::class)->name('activity-log');
    Route::get('/fleet', Fleet::class)->name('fleet');
    Route::get('/fleet-items', FleetItems::class)->name('fleet-items');
    Route::get('/reports', Reports::class)->name('reports');
    Route::get('/report-history', ReportHistory::class)->name('report-history');
    Route::get('/message-history', MessageHistory::class)->name('message-history');
    Route::get('/system-messages', SystemMessages::class)->name('system-messages');
});

// GENERAL MANAGER MODULE ROUTES (GM Role)
Route::middleware(['auth', 'role.redirect'])->prefix('general')->group(function () {
    Route::get('/general-dashboard', GeneralDashboard::class)->name('general-dashboard');
    Route::get('/createuser-account', CreateuserAccount::class)->name('createuser-account');
    Route::get('/system_roles', SystemRoles::class)->name('system_roles');
    Route::get('/hotel_sections', HotelSections::class)->name('hotel_sections');
});





   //Routes for paystack Payments
   Route::get('/pay/{amount}/{email}/{reference}', [PaymentController::class,'pay'])->name('pay'); // reference-reservation ID


   Route::get('/payment/callback',[PaymentController::class, 'handleGatewayCallback'])->name('reservations.comfirm');
   // http://reservations.vinehousegroup.com/comfirm


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
