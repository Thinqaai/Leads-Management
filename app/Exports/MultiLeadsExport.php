<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiLeadsExport implements WithMultipleSheets
{
    protected $allLeads;

    public function __construct($allLeads)
    {
        $this->allLeads = $allLeads;
    }

    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->allLeads as $report) {
            $sheets[] = new LeadsExport($report['leads'], $report['fields'], $report['template']->name);
        }
        return $sheets;
    }
} 