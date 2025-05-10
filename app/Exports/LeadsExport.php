<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class LeadsExport implements FromCollection, WithHeadings, WithTitle
{
    protected $leads;
    protected $fields;
    protected $sheetTitle;

    public function __construct($leads, $fields, $sheetTitle = 'Sheet1')
    {
        $this->leads = $leads;
        $this->fields = $fields;
        $this->sheetTitle = $sheetTitle;
    }

    public function collection()
    {
        return $this->leads->map(function($lead) {
            return collect($this->fields)->map(function($field) use ($lead) {
                return $lead[$field];
            });
        });
    }

    public function headings(): array
    {
        return $this->fields;
    }

    public function title(): string
    {
        return $this->sheetTitle;
    }
} 