@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-primary">Leads Management</h2>
    <div class="row g-4">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('leads.template.save') }}">
                @csrf
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">Selection Criteria</div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            @foreach($fields as $key => $label)
                                <button type="button" class="btn btn-outline-primary criteria-btn modern-btn" data-field="{{ $key }}">{{ $label }}</button>
                            @endforeach
                        </div>
                        <div id="criteria-hidden-inputs"></div>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">Field Data</div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach($fields as $key => $label)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="form-check form-switch modern-switch position-relative p-3 rounded border h-100 field-switch-card" style="background:#f8fafc; transition:box-shadow .2s, background .2s;">
                                        <input class="form-check-input field-switch-input" type="checkbox" name="fields[]" value="{{ $key }}" id="field{{ ucfirst($key) }}">
                                        <label class="form-check-label fw-semibold d-flex align-items-center gap-2" for="field{{ ucfirst($key) }}">
                                            <i class="bi bi-check2-square text-primary field-switch-icon" style="font-size:1.1em;"></i>
                                            <span class="badge bg-light text-primary border border-primary px-2 py-1" style="font-size:0.97em;">{{ $label }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm modern-btn">Simpan Template</button>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-semibold">Report</div>
                <div class="card-body">
                    <ul class="list-group mb-3 border-0" style="background:transparent;">
                        @foreach($templates as $template)
                        <li class="list-group-item d-flex justify-content-between align-items-center modern-list border-0 mb-2 p-0" style="background:transparent;">
                            <div class="d-flex align-items-center gap-2 flex-grow-1 p-3 rounded report-list-item position-relative border" style="background:#f8fafc; transition:box-shadow .2s, background .2s;">
                                <input type="checkbox" class="report-checkbox form-check-input me-2 report-checkbox-lg" name="selected_report[]" value="{{ $template->id }}" id="reportCheck{{ $template->id }}">
                                <label for="reportCheck{{ $template->id }}" class="fw-semibold mb-0 d-flex align-items-center gap-2" style="cursor:pointer;">
                                    <i class="bi bi-file-earmark-bar-graph text-primary"></i>
                                    <span class="badge bg-light text-primary border border-primary px-2 py-1" style="font-size:1em;">{{ $template->name }}</span>
                                </label>
                            </div>
                            <form method="POST" action="{{ route('leads.template.delete', $template->id) }}" onsubmit="return confirm('Hapus template ini?')" class="ms-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm modern-btn px-3 py-2"><i class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    <div class="d-flex gap-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle modern-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-printer"></i> Cetak
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" id="download-pdf"><i class="bi bi-file-earmark-pdf"></i> Download PDF</a></li>
                                <li><a class="dropdown-item" href="#" id="download-excel"><i class="bi bi-file-earmark-excel"></i> Download Excel</a></li>
                            </ul>
                        </div>
                        <form id="delete-selected-form" method="POST" action="{{ route('leads.template.deleteAll') }}" onsubmit="return confirm('Hapus report yang dipilih?')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="ids" id="delete-selected-ids">
                            <button type="submit" class="btn btn-danger modern-btn px-4 py-2"><i class="bi bi-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const criteriaBtns = document.querySelectorAll('.criteria-btn');
    const criteriaHidden = document.getElementById('criteria-hidden-inputs');
    const fieldCheckboxes = {};
    @foreach($fields as $key => $label)
        fieldCheckboxes['{{ $key }}'] = document.getElementById('field{{ ucfirst($key) }}');
    @endforeach
    let selectedCriteria = new Set();

    criteriaBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const field = btn.getAttribute('data-field');
            if (selectedCriteria.has(field)) {
                selectedCriteria.delete(field);
                btn.classList.remove('active');
                if (fieldCheckboxes[field]) fieldCheckboxes[field].checked = false;
            } else {
                selectedCriteria.add(field);
                btn.classList.add('active');
                if (fieldCheckboxes[field]) fieldCheckboxes[field].checked = true;
            }
            renderHiddenInputs();
        });
    });

    function renderHiddenInputs() {
        criteriaHidden.innerHTML = '';
        selectedCriteria.forEach(field => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'criteria[]';
            input.value = field;
            criteriaHidden.appendChild(input);
        });
    }

    document.getElementById('download-pdf').addEventListener('click', function(e) {
        e.preventDefault();
        downloadReport('pdf');
    });
    document.getElementById('download-excel').addEventListener('click', function(e) {
        e.preventDefault();
        downloadReport('excel');
    });

    function downloadReport(type) {
        const checked = Array.from(document.querySelectorAll('.report-checkbox:checked'));
        if (checked.length === 0) {
            alert('Pilih minimal satu report!');
            return;
        }
        const ids = checked.map(cb => cb.value);
        window.location.href = `/leads/report/download?type=${type}&ids=${ids.join(',')}`;
    }

    // Hapus report terpilih
    document.getElementById('delete-selected-form').addEventListener('submit', function(e) {
        const checked = Array.from(document.querySelectorAll('.report-checkbox:checked'));
        if (checked.length === 0) {
            alert('Pilih minimal satu report yang ingin dihapus!');
            e.preventDefault();
            return false;
        }
        const ids = checked.map(cb => cb.value);
        document.getElementById('delete-selected-ids').value = ids.join(',');
    });

    // Modern highlight for field switch
    document.querySelectorAll('.field-switch-input').forEach(function(input) {
        input.addEventListener('change', function() {
            const card = input.closest('.field-switch-card');
            if(input.checked) {
                card.style.background = '#e7f1ff';
                card.style.boxShadow = '0 2px 12px #0d6efd22';
            } else {
                card.style.background = '#f8fafc';
                card.style.boxShadow = '';
            }
        });
        // Initial state
        if(input.checked) {
            input.dispatchEvent(new Event('change'));
        }
    });

    // Modernize report checkbox
    document.querySelectorAll('.report-checkbox-lg').forEach(function(input) {
        input.style.width = '1.3em';
        input.style.height = '1.3em';
        input.style.borderRadius = '0.4em';
        input.style.border = '2px solid #0d6efd';
        input.addEventListener('change', function() {
            if(input.checked) {
                input.style.backgroundColor = '#0d6efd';
                input.style.borderColor = '#0d6efd';
            } else {
                input.style.backgroundColor = '';
                input.style.borderColor = '#0d6efd';
            }
        });
        if(input.checked) input.dispatchEvent(new Event('change'));
    });

    // Hover effect for report list
    document.querySelectorAll('.report-list-item').forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            item.style.background = '#e7f1ff';
            item.style.boxShadow = '0 2px 12px #0d6efd22';
        });
        item.addEventListener('mouseleave', function() {
            item.style.background = '#f8fafc';
            item.style.boxShadow = '';
        });
    });
});
</script>
@endpush 