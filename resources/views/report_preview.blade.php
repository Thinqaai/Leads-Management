@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Preview Report ({{ strtoupper($type) }})</h2>
    <div class="card">
        <div class="card-body">
            <h5>Report yang dipilih:</h5>
            <ul>
                @foreach($templates as $template)
                    <li><strong>{{ $template->name }}</strong><br>
                        <span>Kriteria: {{ implode(', ', $template->criteria) }}</span><br>
                        <span>Field: {{ implode(', ', $template->fields) }}</span>
                    </li>
                @endforeach
            </ul>
            @isset($leads)
            <hr>
            <h5>Data Leads:</h5>
            <table class="table table-bordered">
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
            @endisset
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection 