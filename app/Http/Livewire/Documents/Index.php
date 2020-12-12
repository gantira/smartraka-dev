<?php

namespace App\Http\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $pagination = 9;
    public $searchTerms;
    public $status;
    public $detail;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh', 'destroy'];

    public function render()
    {
        $documents = Document::when(!is_null($this->status), function ($query) {
            $query->where('status', '=', $this->status);
        })
            ->paginate($this->pagination);

        return view('livewire.documents.index', [
            'documentCount' => Document::mycompany()->first(),
            'documents' => $documents,
        ]);
    }

    public function showConfirmation($id)
    {
        $this->emit("swal:confirm", [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'destroy',
            'params'      => $id, // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }

    public function destroy($id)
    {
        Document::find($id)->delete();
    }

    public function detail(Document $document)
    {
        $this->detail = $document;

        $this->emit('tabs');
    }

    public function setPending($id)
    {
        Document::find($id)->updateStatus(3);
    }

    public function setRejected($id)
    {
        Document::find($id)->updateStatus(2);
    }

    public function setApproved($id)
    {
        Document::find($id)->updateStatus(1);
    }

    public function getShowProperty()
    {
        // || auth()->user()->hasRole('super-admin')
        return (in_array($this->detail->status, ['0', '3']));
    }
}
