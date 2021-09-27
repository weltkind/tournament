<?php

namespace App\Console\Commands;

use App\Events\BeginEvent;
use App\Kingdom\Annal\AnnalConsole;
use App\Kingdom\Annal\AnnalLog;
use App\Kingdom\ChurchBook;
use App\Kingdom\Court;
use App\Kingdom\Messenger;
use App\Kingdom\Storyteller;
use App\Kingdom\Tournament;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class CommandBegin extends Command
{
    use AskWithValidation;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'begin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the tournament';

    /**
     * @param AnnalConsole $annalConsole
     * @param AnnalLog $annalLog
     */
    public function __construct(AnnalConsole $annalConsole, AnnalLog $annalLog)
    {
        parent::__construct();
        App::bind(Storyteller::class, function () use ($annalConsole, $annalLog) {
            return new Storyteller($annalConsole, $annalLog);
        });

        event(new BeginEvent());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('test');
        $messenger = new Messenger( $this->askWithValidation('How many knights will we invite (2-100)?'), new ChurchBook());
        $tournament = new Tournament(new Court($messenger->invite()));
        $tournament->run();
    }

}
