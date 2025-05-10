<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportTemplate;
use App\Models\Lead;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LeadsExport;
use App\Exports\MultiLeadsExport;

class LeadsController extends Controller
{
    public function showFilterForm()
    {
        $templates = ReportTemplate::all();
        $fields = [
            'nomor' => 'Nomor',
            'tanggal' => 'Tanggal',
            'nama' => 'Nama',
            'nohp' => 'No HP',
            'alamat' => 'Alamat',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kota' => 'Kota',
            'tipe' => 'Tipe',
            'warna' => 'Warna',
            'hargajual' => 'Harga Jual',
            'discount' => 'Discount',
            'status' => 'Status',
        ];
        return view('leads_filter', compact('templates', 'fields'));
    }

    public function saveTemplate(Request $request)
    {
        $validated = $request->validate([
            'criteria' => 'required|array',
            'fields' => 'required|array',
        ]);

        // Simpan ke database
        ReportTemplate::create([
            'name' => 'Report ' . (ReportTemplate::count() + 1), // Bisa diganti input nama
            'criteria' => $validated['criteria'],
            'fields' => $validated['fields'],
        ]);

        return redirect()->route('leads.filter')->with('success', 'Template berhasil disimpan!');
    }

    public function deleteTemplate($id)
    {
        $template = ReportTemplate::findOrFail($id);
        $template->delete();
        return redirect()->route('leads.filter')->with('success', 'Template berhasil dihapus!');
    }

    public function deleteAllTemplates(Request $request)
    {
        $ids = explode(',', $request->ids);
        ReportTemplate::whereIn('id', $ids)->delete();
        return redirect()->route('leads.filter')->with('success', 'Template terpilih berhasil dihapus!');
    }

    public function downloadReport(Request $request)
    {
        $type = $request->get('type'); // pdf/excel
        $ids = explode(',', $request->get('ids'));
        $templates = \App\Models\ReportTemplate::whereIn('id', $ids)->get();

        $allLeads = [];
        foreach ($templates as $template) {
            $fields = $template->fields;
            $criteria = $template->criteria;

            $query = Lead::query();
            if (!empty($criteria)) {
                foreach ($criteria as $field) {
                    // Bisa tambahkan filter di sini jika ingin
                }
            }
            $leads = $query->get($fields);

            $allLeads[] = [
                'template' => $template,
                'fields' => $fields,
                'leads' => $leads,
            ];
        }

        if ($type === 'excel') {
            $export = new MultiLeadsExport($allLeads);
            return \Maatwebsite\Excel\Facades\Excel::download($export, 'leads-multi.xlsx');
        } else {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('report_pdf_multi', compact('allLeads'));
            return $pdf->download('leads-multi.pdf');
        }
    }
} 