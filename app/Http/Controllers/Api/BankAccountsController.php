<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use CodeFin\Http\Requests;
use CodeFin\Http\Requests\BankAccountCreateRequest;
use CodeFin\Http\Requests\BankAccountUpdateRequest;
use CodeFin\Repositories\BankAccountRepository;
use CodeFin\Criteria\FindByNameCriteria;
use CodeFin\Criteria\FindByLikeAgencyCriteria;


class BankAccountsController extends Controller
{

    /**
     * @var BankAccountRepository
     */
    protected $repository;

    public function __construct(BankAccountRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = $this->repository->paginate();

        return $bankAccounts;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankAccountCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountCreateRequest $request)
    {

        $bankAccount = $this->repository->create($request->all());
        return response()->json($bankAccount, 201);

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankAccount = $this->repository->find($id);
        return response()->json($bankAccount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BankAccountUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BankAccountUpdateRequest $request, $id)
    {

        $bankAccount = $this->repository->update($request->all(), $id);
        return response()->json($bankAccount);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return response()->json([], 204);
    }
}
