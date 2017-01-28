<?php

namespace CodeFin\Listeners;

use CodeFin\Models\Bank;
use CodeFin\Events\BankstoredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;


class BankLogoUploadListener
{
    private $repository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  BankstoredEvent  $event
     * @return void
     */
    public function handle(BankstoredEvent $event)
    {
        $bakn = $event->getBank();
        $logo = $event->getLogo();

        $name = md5(time()).''.$logo->guessExtension;
        $destFile = Bank::logosDir();
        \Storage::disk('public')->putFileAs($destFile, $logo, $name);

        $this->repository->update(['logo' => $name], $bank->id);
    }
}
