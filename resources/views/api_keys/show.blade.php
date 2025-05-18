@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $apiKey->username }}</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        
                        <p class="card-subtitle text-muted">Created on {{ \Carbon\Carbon::parse($apiKey->created_at)->format('Y-m-d H:i:s') }}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="badge rounded-pill bg-{{ $apiKey->status ? 'success' : 'danger' }}"><i class="fas fa-circle me-1"></i> {{ $apiKey->status ? 'Active' : 'Inactive' }}</span>
                    </div>
                </div>
                <hr class="mb-4">

                <ul class="list-group mb-3">
                <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
    <div class="flex-grow-1 mb-2 mb-md-0">
        <span class="fw-bold"><i class="fas fa-key me-2"></i> API Key</span>
        <div class="d-inline-block">
            <span class="masked-value ms-2">{{ Str::mask($apiKey->api_key, '*', 8, -4) }}</span>
            <span class="unmasked-value ms-2 d-none">{{ $apiKey->api_key }}</span>
        </div>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-sm btn-outline-secondary" type="button" id="revealKey">Show</button>
        <button class="btn btn-sm btn-outline-secondary" type="button" id="copyKey" data-clipboard-text="{{ $apiKey->api_key }}">
            <i class="fas fa-copy copy-icon"></i>
            <span class="copied-text d-none ms-2 text-success">Copied!</span>
        </button>
    </div>
</li>

<style>
    @media (max-width: 767.98px) { /* Small screens (phones, 576px and up, but we target below md) */
        .list-group-item > div:last-child {
            margin-top: 0.5rem; /* Add some space between text and buttons when stacked */
        }
    }
</style>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-calendar-alt me-2"></i> End Date</span>
                        <span class="{{ $apiKey->end_date && \Carbon\Carbon::parse($apiKey->end_date)->isPast() ? 'text-danger' : '' }}">
                            {{ $apiKey->end_date ? \Carbon\Carbon::parse($apiKey->end_date)->format('Y-m-d') : 'N/A' }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-hourglass-half me-2"></i> Days Remaining</span>
                        <span>
                            @if($apiKey->end_date && $apiKey->created_at && !\Carbon\Carbon::parse($apiKey->end_date)->isPast())
                                {{ \Carbon\Carbon::now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($apiKey->end_date), false) }}
                            @elseif($apiKey->end_date && \Carbon\Carbon::parse($apiKey->end_date)->isPast())
                                Expired
                            @else
                                N/A
                            @endif
                            @if($apiKey->end_date && $apiKey->created_at && !\Carbon\Carbon::parse($apiKey->end_date)->isPast())
                                @php
                                    $endDate = \Carbon\Carbon::parse($apiKey->end_date);
                                    $createdAt = \Carbon\Carbon::parse($apiKey->created_at);
                                    $today = \Carbon\Carbon::now()->startOfDay();
                                    $totalDays = $createdAt->diffInDays($endDate);
                                    $remainingDays = $endDate->diffInDays($today, false);
                                    $progress = $totalDays > 0 ? min(100, max(0, ($totalDays - $remainingDays) / $totalDays * 100)) : 0;
                                @endphp
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-{{ $remainingDays < 7 ? ($remainingDays < 3 ? 'danger' : 'warning') : 'success' }}" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $remainingDays }}" aria-valuemin="0" aria-valuemax="{{ $totalDays }}"></div>
                                </div>
                            @endif
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-phone me-2"></i> Phone</span>
                        <span>{{ $apiKey->phone_number ?? 'Not provided' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-envelope me-2"></i> Email</span>
                        <span>{{ $apiKey->email ?? 'Not provided' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-tag me-2"></i>Platform Category</span>
                        <span>{{ $apiKey->category ?? 'N/A' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-clock me-2"></i> Last GET Request</span>
                        <span>{{ $apiKey->last_used ? $apiKey->last_used->diffForHumans() : 'Never' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-bold"><i class="fas fa-list-ol me-2"></i>Number of GET responses</span>
                        <span>{{ $apiKey->number_of_requests }}</span>
                    </li>
                </ul>

                <h6 class="mt-4 mb-3">Access History</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover" id="table">
                        <thead class="table-primary">
                            <tr>
                                <th>SN</th>
                                <th>Accessed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($apiKey->access_history)
                                @foreach($apiKey->access_history as $index => $access)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($access['accessed_at'])->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="2" class="text-center">No access history available.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('api-keys.index') }}" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left me-2"></i> Back to List</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* No specific styles needed for list-group in this context */
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const revealButton = document.getElementById('revealKey');
            const apiKeyMaskedSpan = document.querySelector('.masked-value');
            const apiKeyUnmaskedSpan = document.querySelector('.unmasked-value');
            const apiKeyInputValue = "{{ $apiKey->api_key }}";
            let isMasked = true;

            revealButton.addEventListener('click', function() {
                if (isMasked) {
                    apiKeyMaskedSpan.classList.add('d-none');
                    apiKeyUnmaskedSpan.classList.remove('d-none');
                    revealButton.textContent = 'Hide';
                } else {
                    apiKeyMaskedSpan.classList.remove('d-none');
                    apiKeyUnmaskedSpan.classList.add('d-none');
                    revealButton.textContent = 'Show';
                }
                isMasked = !isMasked;
            });

            const clipboard = new ClipboardJS('#copyKey');
            const copyButton = document.getElementById('copyKey');
            const copyIcon = copyButton.querySelector('.copy-icon');
            const copiedText = copyButton.querySelector('.copied-text');

            clipboard.on('success', function(e) {
                copyIcon.classList.add('d-none');
                copiedText.classList.remove('d-none');
                setTimeout(() => {
                    copyIcon.classList.remove('d-none');
                    copiedText.classList.add('d-none');
                }, 1500); // Show "Copied!" for 1.5 seconds
                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                alert('Failed to copy API Key. Please select and copy manually.');
            });
        });
    </script>
@endpush