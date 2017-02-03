<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $repository = app(\CodeFin\Repositories\BankRepository::class);
        foreach ($this->getData() as $bankArray) {
            $repository->create($bankArray);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $repository = app(\CodeFin\Repositories\BankRepository::class);
        $repository->skipPresenter(true);
        $count = count($this->getData());
        foreach (range(1, $count) as $value) {
            $model = $repository->find($value);
            $path = \CodeFin\Models\Bank::logosDir() . '/' . $model->logo;
            \Storage::disk('public')->delete($path);
            $model->delete();
        }
    }

    public function getData(){
        return [
            [
                'name' => 'Caixa',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/caixa.jpg'),
                'caixa.jpg'
                )
            ],
            [
                'name' => 'Bradesco',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bradesco.jpg'),
                'bradesco.jpg'
                )
            ],
            [
                'name' => 'Itaú',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/itau.jpg'),
                'itau.jpg'
                )
            ],
            [
                'name' => 'Santander',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/santander.jpg'),
                'santander.jpg'
                )
            ],
            [
                'name' => 'Banco do Brasil',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/banco-do-brasil.jpg'),
                'banco-do-brasil.jpg'
                )
            ]
        ];
    }
}
