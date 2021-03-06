<?php

namespace CodeFin\Transformers;

use League\Fractal\TransformerAbstract;
use CodeFin\Models\BankAccount;
use CodeFin\Transformers\BankTransformer;

/**
 * Class BankAccountTransformer
 * @package namespace CodeFin\Transformers;
 */
class BankAccountTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['bank'];

    /**
     * Transform the \BankAccount entity
     * @param \BankAccount $model
     *
     * @return array
     */
    public function transform(BankAccount $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'agency'     => $model->agency,
            'account'    => $model->account,
            'default'    => (bool) $model->default,
            'bank_id'    => (int)  $model->bank_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeBank(BankAccount $model)
    {
        return $this->item($model->bank, new BankTransformer());
    }
}
