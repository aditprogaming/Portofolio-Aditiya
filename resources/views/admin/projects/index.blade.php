<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Kelola Project Portofolio') }}
            </h2>
            {{-- Tombol Tambah Project Utama (Warna Beda & Teks Jelas) --}}
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 !text-white font-bold rounded-lg text-sm shadow-md transition duration-200 flex items-center gap-2">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>+ Tambah Project</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(session('success'))
                <div class="p-4 bg-emerald-100 border border-emerald-400 text-emerald-800 rounded-lg text-sm font-medium shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Daftar Project</h3>
                    <a href="{{ route('admin.projects.create') }}" class="px-3.5 py-1.5 bg-indigo-600 hover:bg-indigo-700 !text-white font-bold rounded-md text-xs transition">
                        + Tambah Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-800 dark:text-gray-200 divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700/60 text-gray-700 dark:text-gray-200 uppercase text-xs font-bold tracking-wider">
                            <tr>
                                <th class="p-4 w-32">Gambar</th>
                                <th class="p-4">Judul Project</th>
                                <th class="p-4">Tech Stack</th>
                                <th class="p-4 text-center w-36">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                            @forelse($projects as $project)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40 transition">
                                    <td class="p-4">
                                        <div class="w-24 h-16 rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-900 border border-gray-300 dark:border-gray-700">
                                            @if($project->image)
                                                <img src="{{ asset($project->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-xs text-gray-400">No Image</div>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="p-4 font-bold text-gray-900 dark:text-white">
                                        {{ $project->title }}
                                    </td>

                                    <td class="p-4">
                                        @if(is_array($project->tech_stack))
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($project->tech_stack as $tech)
                                                    <span class="px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300 rounded text-xs border border-gray-300 dark:border-gray-600 font-medium">
                                                        {{ $tech }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300 rounded text-xs border border-gray-300 dark:border-gray-600 font-medium">
                                                {{ $project->tech_stack }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="px-3 py-1.5 bg-amber-500 hover:bg-amber-400 !text-slate-950 font-bold rounded text-xs transition shadow-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-500 !text-white font-bold rounded text-xs transition shadow-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada project ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>