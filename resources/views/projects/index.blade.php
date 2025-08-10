<x-app-layout>
    <x-slot name="header">
        <div class="theme-app rounded-lg shadow-sm" style="background: linear-gradient(to right, var(--secondary-bg), var(--primary-bg));">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-4 sm:p-5 md:p-6">
                <div class="flex items-center gap-3">
                    <div class="p-2 sm:p-3 rounded-lg shadow-md" style="background-color: var(--hover-bg);">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" style="color: var(--primary-text);" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-2xl sm:text-3xl leading-tight" style="color: var(--primary-text);">Project Management</h1>
                        <p class="text-sm" style="color: var(--secondary-text);">Manage and track all your projects</p>
                        <div class="hidden sm:flex items-center gap-4 mt-2">
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full inline-block" style="background-color: var(--hover-bg);"></span>
                                <span class="text-xs" style="color: var(--secondary-text);">Enterprise Grade</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full inline-block" style="background-color: var(--hover-bg);"></span>
                                <span class="text-xs" style="color: var(--secondary-text);">Real-time Tracking</span>
                            </div>
                        </div>
                    </div>
                </div>
                @can('create project')
                    <a href="{{ route('projects.create') }}" class="theme-app inline-flex items-center justify-center w-full sm:w-auto px-5 sm:px-6 py-2.5 sm:py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 lg:mr-24" style="background-color: var(--hover-bg); color: var(--primary-text);" onmouseover="this.style.backgroundColor='var(--primary-bg-light)'" onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create New Project
                    </a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-6 sm:py-8 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="w-full px-3 sm:px-5 lg:px-8 space-y-6 sm:space-y-8">
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 sm:p-5">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-sm text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 sm:p-5 rounded-lg">
                    <div class="flex items-start gap-3">
                        <svg class="h-5 w-5 text-red-400 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($projects as $index => $project)
                    @php
                        $cardBackgrounds = [
                            'background: linear-gradient(135deg, #dbeafe 0%, #e0f2fe 100%);',
                            'background: linear-gradient(135deg, #fef2f2 0%, #fce7e7 100%);',
                            'background: linear-gradient(135deg, #fefce8 0%, #fef3c7 100%);',
                            'background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);',
                            'background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);',
                            'background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 100%);',
                            'background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);',
                            'background: linear-gradient(135deg, #fff7ed 0%, #fed7aa 100%);',
                            'background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);',
                            'background: linear-gradient(135deg, #ecfdf5 0%, #bbf7d0 100%);',
                            'background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);',
                            'background: linear-gradient(135deg, #fefce8 0%, #ecfccb 100%);',
                        ];
                        $cardBg = $cardBackgrounds[$index % 12];
                    @endphp

                    <div class="theme-app rounded-xl shadow-lg p-5 sm:p-6 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1 flex flex-col justify-between" style="{{ $cardBg }}">
                        <div>
                            <div class="mb-4">
                                <h2 class="text-lg sm:text-xl font-bold" style="color: var(--primary-bg);">{{ $project->title }}</h2>
                            </div>
                            <p class="text-sm mb-3" style="color: var(--secondary-bg);"><span class="font-medium">👤 Client:</span> {{ $project->client_name ?: 'Not specified' }}</p>
                            @if($project->budget)
                                <p class="text-sm mb-3" style="color: var(--secondary-bg);"><span class="font-medium">💰 Budget:</span> <span class="font-bold" style="color: var(--hover-bg);">₹{{ number_format($project->budget, 2) }}</span></p>
                            @endif
                            <div class="mb-4">
                                <h3 class="text-sm font-semibold mb-2" style="color: var(--primary-bg);">Project Description</h3>
                                <div class="bg-white bg-opacity-70 p-3 rounded border text-sm" style="color: var(--secondary-bg);">{{ $project->description ?: 'No description provided' }}</div>
                            </div>
                            <div class="mb-4 sm:mb-6">
                                <h3 class="text-sm font-semibold mb-2" style="color: var(--primary-bg);">TEAM MEMBERS</h3>
                                <div class="flex flex-wrap gap-2">
                                    @forelse ($project->members as $member)
                                        <div class="flex items-center bg-white bg-opacity-70 border border-gray-200 rounded-full px-3 py-1">
                                            <div class="w-6 h-6 rounded-full mr-2 flex items-center justify-center" style="background-color: var(--hover-bg);">
                                                <span class="text-xs font-bold" style="color: var(--primary-text);">{{ substr($member->name, 0, 1) }}</span>
                                            </div>
                                            <span class="text-xs font-medium" style="color: var(--secondary-bg);">{{ $member->name }}</span>
                                        </div>
                                    @empty
                                        <span class="text-xs italic" style="color: var(--secondary-bg);">No members assigned</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 pt-4 border-t border-gray-200 border-opacity-50">
                            @can('edit project')
                                <a href="{{ route('projects.edit', $project->id) }}" class="theme-app inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded-md transition-all duration-200 hover:scale-105" style="background-color: var(--hover-bg); color: var(--primary-text);" onmouseover="this.style.backgroundColor='var(--primary-bg-light)'" onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                            @endcan

                            <a href="{{ route('projects.show', ['project' => $project]) }}" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 transition-all duration-200 hover:scale-105">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View Tasks
                            </a>

                            @can('delete project')
                                <button type="button" onclick="showDeleteModal('{{ route('projects.destroy', $project->id) }}')" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 transition-all duration-200 hover:scale-105">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>

            @if($projects->isEmpty())
                <div class="text-center py-12">
                    <div class="bg-gray-100 p-4 rounded-full mx-auto mb-4 w-fit">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Projects Found</h3>
                    <p class="text-gray-500 mb-4">Get started by creating your first project.</p>
                    @can('create project')
                        <a href="{{ route('projects.create') }}" class="theme-app inline-flex items-center px-6 py-3 font-semibold rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 ease-in-out focus:outline-none focus:ring-4" style="background-color: var(--hover-bg); color: var(--primary-text);" onmouseover="this.style.backgroundColor='var(--primary-bg-light)'" onmouseout="this.style.backgroundColor='var(--hover-bg)'">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Your First Project
                        </a>
                    @endcan
                </div>
            @endif
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-5 sm:p-6 max-w-md w-full mx-3 sm:mx-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-3 sm:mb-4">Confirm Deletion</h3>
            <p class="text-gray-600 mb-5 sm:mb-6">Are you sure you want to delete this project? This action cannot be undone.</p>
            <div class="flex flex-col sm:flex-row sm:justify-end gap-2 sm:gap-4">
                <button type="button" onclick="hideDeleteModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(actionUrl) {
            const form = document.getElementById('deleteForm');
            const modal = document.getElementById('deleteModal');
            if (form && modal) {
                form.action = actionUrl;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        }
        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }
    </script>
</x-app-layout>
