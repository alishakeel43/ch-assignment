<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class SearchForm extends Component
{

    use WithPagination;
    public $name = '';
    public $domain_authority='';
    public $root_domain_count='';
    public $terms = [];

    protected $rules = [
        'name' => 'nullable|min:2',
    ];

    protected $listeners = ['searchUpdate' => 'updatingSearch'];

    public function getCompanies()
    {

        $this->terms = $this->filterTerm();
        $companies = Company::searchCompanies($this->terms);
        $companies = $companies->paginate( 10 );
        $this->resetPage();
        return $companies;
    }

    protected function filterTerm()
    {
        $specialChar = [
            '\'',
            '"',
            ',',
            ';',
            '<',
            '>',
            '+',
            '-',
            '*',
        ];

        $this->terms['name'] = trim($this->name);
        $this->terms['name'] = str_replace($specialChar, '', $this->terms['name']);

        $this->terms['domain_authority'] = trim($this->domain_authority);
        $this->terms['domain_authority'] = str_replace($specialChar, '', $this->terms['domain_authority']);

        $this->terms['root_domain_count'] = trim($this->root_domain_count);
        $this->terms['root_domain_count'] = str_replace($specialChar, '', $this->terms['root_domain_count']);

        return $this->terms;
    }

        public function render()
    {
        return view('livewire.search-form', ['companies'=> $this->getCompanies()]);
    }
}
