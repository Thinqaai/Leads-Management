<!DOCTYPE html>
<html>
<head>
    <title>Leads Multi Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { margin-top: 30px; }
        .report-title { font-size: 20px; font-weight: bold; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #333; padding: 6px 10px; text-align: left; }
        th { background: #f5f5f5; }
        .meta { margin-bottom: 10px; font-size: 14px; }
    </style>
</head>
<body>
    <h1>Leads Report</h1>
    @foreach($allLeads as $report)
        <div class="report-title">{{ $report['template']->name }}</div>
        <div class="meta">
            <strong>Kriteria:</strong> {{ implode(', ', $report['template']->criteria) }}<br>
            <strong>Field:</strong> {{ implode(', ', $report['fields']) }}
        </div>
        <table>
            <thead>
                <tr>
                    @foreach($report['fields'] as $field)
                        <th>{{ ucfirst($field) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($report['leads'] as $lead)
                    <tr>
                        @foreach($report['fields'] as $field)
                            <td>{{ $lead[$field] }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html> 