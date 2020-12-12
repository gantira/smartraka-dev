<?php

namespace App\Traits;

use App\Models\Balance;
use App\Models\Journal;
use App\Models\Ledger;

trait MakeReport
{

    public function makeReport($model, $type = '')
    {
        $this->daily($model, $type);
        $this->journal($model, $type);
        $this->ledger($model, $type);
    }

    public function daily($model, $type)
    {
        Balance::create([
            'document_id' => $model->id,
            'description' => $model->category->name,
            'qty' => $model->totalQty,
            'debit' => $type == 'in' ? $model->total : 0,
            'credit' => $type == 'out' ? $model->total : 0,
        ]);
    }

    public function journal($model, $type)
    {
        Journal::create([
            'document_id' => $model->id,
            'company_id' => auth()->user()->company->id,
            'account_id' => 1,
            'description' => $model->category->account->find(1)->name,
            'debit' => $model->total,
            'credit' => 0,
        ]);

        Journal::create([
            'document_id' => $model->id,
            'company_id' => auth()->user()->company->id,
            'account_id' => $model->category->account->id,
            'description' => $model->category->account->name,
            'debit' => 0,
            'credit' => $model->total,
        ]);
    }

    public function ledger($model, $type)
    {
        if ($type == 'in') {
            Ledger::create([
                'document_id' => $model->id,
                'company_id' => auth()->user()->company->id,
                'account_id' => 1,
                'parent_id' => $model->category->account->id,
                'description' => $model->category->account->find(1)->name,
                'debit' => $model->total,
                'credit' => 0,
            ]);

            Ledger::create([
                'document_id' => $model->id,
                'company_id' => auth()->user()->company->id,
                'account_id' => $model->category->account->id,
                'parent_id' => 1,
                'description' => $model->description,
                'debit' => 0,
                'credit' => $model->total,
            ]);
        } else {
            Ledger::create([
                'document_id' => $model->id,
                'company_id' => auth()->user()->company->id,
                'account_id' => 1,
                'parent_id' => $model->category->account->id,
                'description' => $model->category->account->find(1)->name,
                'debit' => 0,
                'credit' => $model->total,
            ]);

            Ledger::create([
                'document_id' => $model->id,
                'company_id' => auth()->user()->company->id,
                'account_id' => $model->category->account->id,
                'parent_id' => 1,
                'description' => $model->description,
                'debit' => 0,
                'credit' => $model->total,
            ]);
        }
    }
}
