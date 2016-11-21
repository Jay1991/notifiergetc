<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Subscription;
use Carbon\Carbon;


class MailQuarter extends Mailable
{
    use Queueable, SerializesModels;

    protected $subscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      $start = $this->subscription->quarter;

      $startDate = Carbon::parse($start);

      $end = $this->subscription->end;

      $endDate = Carbon::parse($end);

      $remained = $startDate->diffForHumans($endDate);

        return $this->view('mail.quarter')
                    ->with([
                      'customer' => $this->subscription->customer,
                      'service' => $this->subscription->service,
                      'remained' => $remained,
                      'end' =>$this->subscription->end,
                    ]);
    }
}
