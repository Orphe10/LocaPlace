<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $now = Carbon::now();
            // Mettre à jour les réservations en attente qui ont été créées il y a plus de 48 heures
            Reservation::where('status', 'pending')
                ->where('created_at', '<=', $now->subHours(48))
                ->update(['status' => 'cancelled']);
        })->hourly();  // Exécuter toutes les heures
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}