<?php

namespace CodeFin\Events;

use CodeFin\Models\Bank;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;


class BankStoredEvent
{
    private $bank;

    private $logo;

    use InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bank $bank, UploadedFile $logo = null)
    {
        $this->bank = $bank;
        $this->logo = $logo;
    }

    public function getBank()
    {
        return $this->bank;
    }

    public function getLogo()
    {
        return $this->logo;
    }
}
