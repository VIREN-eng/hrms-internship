<x-app-layout>
    <style>
        .theme-app {
            --primary-bg: #0b1f3a;           /* Navy-950 – Deep corporate blue */
            --primary-bg-light: #102c4e;     /* Navy-900 – Slightly lighter for cards/sections */
            --primary-text: #f8fafc;         /* Light Steel – High contrast text */
            --primary-border: #1e3a5f;       /* Muted steel blue border */
            --hover-bg: #2563eb;             /* Blue-600 – Primary action hover */
            --secondary-bg: #2c4e9c;         /* Slate-900 – For sidebar/nav */
            --secondary-text: #cbd5e1;       /* Slate-300 – Softer text */
        }

        /* Removed animations and applied corporate theme */
        .card {
            background: #ffffff;
            border: 1px solid var(--primary-border);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(11, 31, 58, .08);
            transition: box-shadow .2s ease, transform .2s ease;
        }

        .card:hover {
            box-shadow: 0 8px 24px rgba(11, 31, 58, .12);
            transform: translateY(-1px);
        }

        .avatar-circle {
            width: 48px;
            height: 48px;
            border-radius: 9999px;
            background: linear-gradient(to bottom right, var(--secondary-bg), var(--primary-bg-light));
            color: var(--primary-text);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: .375rem;
            padding: .25rem .625rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: .8125rem;
            border: 1px solid transparent;
        }

        .status-badge.active {
            background: #f0fdf4;
            color: #16a34a;
            border-color: #86efac;
        }

        .status-badge.checked-out {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }

        .info-tile {
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid var(--primary-border);
            background: var(--primary-bg-light);
            color: var(--primary-text);
            transition: transform .15s ease;
        }

        .info-tile:hover {
            transform: translateY(-2px);
        }

        .break-card {
            padding: .75rem;
            border-radius: 10px;
            border: 1px solid var(--primary-border);
            background: var(--primary-bg-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .break-badge {
            padding: .25rem .6rem;
            border-radius: 9999px;
            font-weight: 700;
            font-size: .75rem;
            background: var(--hover-bg);
            color: var(--primary-text);
        }

        .input {
            width: 100%;
            background: #fff;
            color: var(--primary-bg);
            border: 1px solid var(--primary-border);
            border-radius: .5rem;
            padding: .5rem .75rem;
            font-size: .875rem;
            outline: none;
        }

        .input:focus {
            box-shadow: 0 0 0 2px rgba(37, 99, 235, .25);
            border-color: var(--hover-bg);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: .5rem 1rem;
            border-radius: .5rem;
            font-weight: 600;
            font-size: .875rem;
            transition: background-color .15s ease, color .15s ease, border-color .15s ease;
            border: 1px solid transparent;
        }

        .btn-primary {
            background: var(--primary-bg-light);
            color: var(--primary-text);
            border-color: var(--primary-border);
        }

        .btn-primary:hover {
            background: var(--hover-bg);
        }

        .btn-ghost {
            background: #fff;
            color: var(--primary-bg);
            border-color: var(--primary-border);
        }

        .btn-ghost:hover {
            background: var(--primary-bg-light);
            color: var(--primary-text);
        }

        .section-title {
            color: var(--primary-bg);
            font-weight: 700;
            letter-spacing: .2px;
        }

        /* Updated info tile colors to use corporate theme */
        .info-tile-green {
            background: var(--primary-bg-light);
            border-color: var(--primary-border);
            color: var(--primary-text);
        }

        .info-tile-red {
            background: var(--primary-bg-light);
            border-color: var(--primary-border);
            color: var(--primary-text);
        }

        .info-tile-blue {
            background: var(--primary-bg-light);
            border-color: var(--primary-border);
            color: var(--primary-text);
        }

        .info-tile-yellow {
            background: var(--primary-bg-light);
            border-color: var(--primary-border);
            color: var(--primary-text);
        }

        .info-tile-purple {
            background: var(--primary-bg-light);
            border-color: var(--primary-border);
            color: var(--primary-text);
        }
    </style>

    @can('attendance report')
        <x-slot name="header">
            <div class="theme-app flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between p-4 sm:p-6 rounded-lg shadow-sm"
                style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">

                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <h2 class="font-bold text-xl sm:text-2xl leading-tight truncate"
                            style="color: var(--primary-text);">
                            Attendance Report
                        </h2>
                        <p class="text-xs sm:text-sm" style="color: var(--secondary-text);">
                            Daily attendance tracking and break management
                        </p>
                    </div>
                </div>
            </div>
        </x-slot>

        <div class="theme-app py-6 sm:px-4 lg:px-8" style="background: var(--primary-text);">
            <div class="w-full max-w-6xl mx-auto space-y-6">
                <!-- Removed animate-fade-in class -->
                <div class="card p-4 sm:p-6">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div class="flex items-start sm:items-center gap-3">
                            <div class="p-3 rounded-lg" style="background: var(--primary-bg-light); border: 1px solid var(--primary-border);">
                                <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="section-title text-base sm:text-lg">Showing Attendance</h3>
                                <p style="color: var(--secondary-text);" class="text-sm">
                                    <strong>{{ \Carbon\Carbon::parse($fromDate)->format('M j, Y') }}</strong>
                                    to
                                    <strong>{{ \Carbon\Carbon::parse($toDate)->format('M j, Y') }}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="px-4 py-1.5 rounded-full self-start md:self-auto"
                            style="background: var(--primary-bg-light); border: 1px solid var(--primary-border);">
                            <span style="color: var(--primary-text);" class="font-medium">{{ count($attendances) }} Records</span>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('admin.attendance.report') }}"
                        class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
                        <div>
                            <label for="from_date" class="block text-sm mb-1" style="color: var(--secondary-text);">From date</label>
                            <input type="date" id="from_date" name="from_date" value="{{ $fromDate }}"
                                class="input">
                        </div>
                        <div>
                            <label for="to_date" class="block text-sm mb-1" style="color: var(--secondary-text);">To date</label>
                            <input type="date" id="to_date" name="to_date" value="{{ $toDate }}" class="input">
                        </div>
                        <div class="lg:col-span-3 flex items-end gap-2">
                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                            <a href="{{ route('admin.attendance.report') }}" class="btn btn-ghost">Reset</a>
                            <a href="{{ route('admin.report.form') }}" class="btn btn-ghost">Download Report</a>
                        </div>
                    </form>
                </div>

                @forelse ($attendances as $index => $attendance)
                    <!-- Removed animate-fade-in class -->
                    <div class="card">
                        <div class="p-4 sm:p-6 border-b" style="border-color: var(--primary-border);">
                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="avatar-circle">
                                        <span>{{ strtoupper(substr($attendance['name'], 0, 2)) }}</span>
                                    </div>
                                    <div class="min-w-0">
                                        <h3 style="color: var(--primary-bg);" class="text-lg sm:text-xl font-semibold break-words">
                                            {{ $attendance['name'] }}
                                        </h3>
                                        <p style="color: var(--secondary-text);" class="text-sm">Employee ID:
                                            EMP{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    @if ($attendance['punch_out'])
                                        <span class="status-badge checked-out">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                            </svg>
                                            Checked Out
                                        </span>
                                    @else
                                        <span class="status-badge active">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Active
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Updated all info tiles to use corporate theme -->
                        <div class="p-4 sm:p-6 grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                            <div class="info-tile info-tile-green">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background: var(--hover-bg);">
                                        <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm">Punch In</p>
                                </div>
                                <p class="text-2xl font-bold">
                                    {{ \Carbon\Carbon::parse($attendance['punch_in'])->format('h:i A') }}</p>
                                <p class="text-xs mt-1" style="color: var(--secondary-text);">Remark:
                                    {{ $attendance['punch_in_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile info-tile-red">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background: var(--hover-bg);">
                                        <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm">Punch Out</p>
                                </div>
                                <p class="text-2xl font-bold">
                                    {{ $attendance['punch_out'] ? \Carbon\Carbon::parse($attendance['punch_out'])->format('h:i A') : 'Not punched out' }}
                                </p>
                                <p class="text-xs mt-1" style="color: var(--secondary-text);">Remark:
                                    {{ $attendance['punch_out_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile info-tile-blue">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background: var(--hover-bg);">
                                        <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm">Total Hours</p>
                                </div>
                                <p class="text-2xl font-bold">
                                    {{ $attendance['total_working_hours'] }}</p>
                                <p class="text-xs mt-1" style="color: var(--secondary-text);">Daily total work duration</p>
                            </div>

                            <div class="info-tile info-tile-yellow">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background: var(--hover-bg);">
                                        <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm">Punch In Again</p>
                                </div>
                                <p class="text-2xl font-bold">
                                    {{ $attendance['punch_in_again'] ? \Carbon\Carbon::parse($attendance['punch_in_again'])->format('h:i A') : 'Not punched in again' }}
                                </p>
                                <p class="text-xs mt-1" style="color: var(--secondary-text);">Remark:
                                    {{ $attendance['punch_in_again_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile info-tile-purple">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background: var(--hover-bg);">
                                        <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm">Punch Out Again</p>
                                </div>
                                <p class="text-2xl font-bold">
                                    {{ $attendance['punch_out_again'] ? \Carbon\Carbon::parse($attendance['punch_out_again'])->format('h:i A') : 'Not punched out again' }}
                                </p>
                                <p class="text-xs mt-1" style="color: var(--secondary-text);">Remark:
                                    {{ $attendance['punch_out_again_remarks'] ?? '-' }}</p>
                            </div>

                            <div class="info-tile info-tile-blue">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="p-2 rounded-lg" style="background: var(--hover-bg);">
                                        <svg class="w-5 h-5" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p class="font-medium text-sm">Total Overtime Hours</p>
                                </div>
                                <p class="text-2xl font-bold">
                                    {{ $attendance['overtime_working_hours'] }}</p>
                                <p class="text-xs mt-1" style="color: var(--secondary-text);">Additional hours worked</p>
                            </div>
                        </div>

                        <div class="px-4 sm:px-6 pb-5">
                            <div class="card p-4">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="section-title text-base sm:text-lg flex items-center gap-2">
                                        <svg class="w-5 h-5" style="color: var(--primary-bg);" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        Break Details
                                    </h4>
                                    @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                        <span class="px-3 py-1 rounded-full text-sm font-medium"
                                            style="background: var(--primary-bg-light); border: 1px solid var(--primary-border); color: var(--primary-text);">
                                            {{ count($attendance['breaks']) }}
                                            Break{{ count($attendance['breaks']) > 1 ? 's' : '' }}
                                        </span>
                                    @endif
                                </div>

                                @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                                        @foreach ($attendance['breaks'] as $break)
                                            <div class="break-card">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-lg" style="color: var(--primary-text);">
                                                        @php
                                                            $breakType = strtolower($break['type'] ?? 'custom');
                                                            $emoji = match($breakType) {
                                                                'morning tea' => '☕',
                                                                'lunch' => '🍽️',
                                                                'evening tea' => '🫖',
                                                                default => '💼'
                                                            };
                                                        @endphp
                                                        {{ $emoji }} {{ ucwords($break['type'] ?? 'Custom') }}
                                                    </span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="break-badge">
                                                        {{ is_numeric($break['duration']) ? gmdate('H:i:s', $break['duration']) : $break['duration'] }}
                                                    </span>
                                                    <p class="text-xs" style="color: var(--secondary-text);">Duration</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-8">
                                        <div class="p-3 rounded-full mx-auto mb-3 w-fit"
                                            style="background: var(--primary-bg-light); border: 1px solid var(--primary-border);">
                                            <svg class="w-6 h-6" style="color: var(--primary-text);" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <h4 class="text-sm font-medium mb-1" style="color: var(--primary-bg);">No Breaks Taken</h4>
                                        <p class="text-xs" style="color: var(--secondary-text);">Employee worked continuously today</p>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium mt-2"
                                            style="background: var(--primary-bg-light); color: var(--primary-text); border: 1px solid var(--primary-border);">
                                            Continuous Work
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Removed animate-fade-in class -->
                    <div class="text-center py-12 card">
                        <div class="p-4 rounded-full mx-auto mb-4 w-fit"
                            style="background: var(--primary-bg-light); border: 1px solid var(--primary-border);">
                            <svg class="w-8 h-8" style="color: var(--primary-text);" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium mb-2" style="color: var(--primary-bg);">No Attendance Records</h3>
                        <p style="color: var(--secondary-text);">No attendance records found for the selected range.</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endcan
</x-app-layout>
