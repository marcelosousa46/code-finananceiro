<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use CodeFin\Repositories\BankRepository;

class BanksController extends Controller
{
    /**
     * @var BanksRepository
     */
    protected $repository;

    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function index()
    {
        return $banks = $this->repository->all();
    }
}
