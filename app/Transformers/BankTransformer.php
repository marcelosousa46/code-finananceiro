<?php

namespace CodeFin\Transformers;

use CodeFin\Models\Bank;
use Illuminate\Support\Facades\Request;
use League\Fractal\TransformerAbstract;
/**
 * Class BankTransformer
 * @package namespace CodeFin\Transformers;
 */
class BankTransformer extends TransformerAbstract
{

    /**
     * Transform the \Bank entity
     * @param \Bank $model
     *
     * @return array
     */
    public function transform(Bank $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'logo'       => $this->makeLogoPath($model),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function makeLogoPath(Bank $model)
    {
        $url = url('/');
        $folder = Bank::logosDir();
        return "$url/storage/$folder/{$model->logo}";
    }
}
