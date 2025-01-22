<?php

namespace App\Livewire\Reservations;

use Livewire\Component;
use App\Models\Reservation;

class PaymentGateway extends Component
{





    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function pay($amount, $email, $reference)
    {
        try {
            $data = array(
                "amount" => $amount,
                "email" => $email,
                "currency" => "NGN",
                "reference" => $reference, // this is reservation ID
            );

            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    // pay later function

    public function pay_later($amount, $reference)
    {
        Reservation::where('reservation_id', $reference)
            ->update([
                'amount_paid' => $amount / 100,  //convert paystack default  kobo to naira
                'payment_status' => 'Pending',
            ]);



        $customer = Reservation::where('reservation_id', $reference)->value('fullname');
        $reservation_id = Reservation::where('reservation_id', $reference)->value('reservation_id');

        return view('reservations.pending', [
            'customer' => $customer,
            'reservation_id' => $reservation_id,

        ]);
    }


    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentdetails = Paystack::getPaymentData();

        if ($paymentdetails['data']['status'] == 'success')


            Reservation::where('reservation_id', $paymentdetails['data']['reference'])
                ->update([
                    'amount_paid' => $paymentdetails['data']['amount'] / 100,  //convert paystack default  kobo to naira
                    'payment_status' => 'Paid',
                ]);

        $customer = Reservation::where('reservation_id', $paymentdetails['data']['reference'])->value('fullname');

        return view('reservations.comfirm', [
            'paymentdetails' => $paymentdetails,
            'customer' => $customer,

        ]);
    }


    public function render()
    {
        return view('livewire.reservations.payment-gateway');
    }
}
