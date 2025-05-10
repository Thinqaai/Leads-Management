<!DOCTYPE html>
<html>
<head>
    <title>Leads PDF</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 4px; }
    </style>
</head>
<body>
    <h2>Leads Report</h2>
    <table>
        <thead>
            <tr>
                @foreach($fields as $field)
                    <th>{{ ucfirst($field) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
                <tr>
                    @foreach($fields as $field)
                        <td>{{ $lead[$field] }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 