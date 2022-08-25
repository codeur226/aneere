<?php

namespace App\Console;

use DateTime;
use DateInterval;
use App\Models\Etat;
use App\Models\Agrement;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
                    $etatsActif=Etat::where('etat','like','Actif')->first();
                    $etatsExpire=Etat::where('etat','like','Expiré')->first();
                    $agrements=Agrement::where('etat_id','like',$etatsActif->id)->get();
                    foreach($agrements as $agr){
                        $date = new DateTime($agr->date_delivrance);
                        $date->add(new DateInterval('P5Y'));
                        $date1 = $date->format('Y-m-d');
                        // dd($date1);
                        if($date1 < date('Y-m-d')){
                            $agr->etat_id=$etatsExpire->id;
                            $agr->save();
                        }
                    }
        })->daily();

    }

    /**
     * Register the commands for the application.
     * 
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
