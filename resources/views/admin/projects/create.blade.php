<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Project Baru') }}
            </h2>
            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-800 !text-white font-bold rounded-lg text-sm shadow transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-xl p-6 md:p-8 border border-gray-200 dark:border-gray-700">
                
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Judul Proyek -->
                    <div>
                        <label for="title" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Judul Project</label>
                        <input type="text" name="title" id="title" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 !text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 font-medium"
                            placeholder="Contoh: Website Profil Perusahaan">
                    </div>

                    <!-- Deskripsi Proyek -->
                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Deskripsi Project</label>
                        <textarea name="description" id="description" rows="4" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 !text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 font-medium"
                            placeholder="Tuliskan deskripsi ringkas tentang project ini..."></textarea>
                    </div>

                    <!-- Tech Stack -->
                    <div>
                        <label for="tech_stack" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Tech Stack <span class="text-xs font-normal text-gray-500">(Pisahkan dengan koma)</span></label>
                        <input type="text" name="tech_stack" id="tech_stack" required
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 !text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 font-medium"
                            placeholder="Laravel, Tailwind CSS, MySQL">
                    </div>

                    <!-- Link Demo / Repository -->
                    <div>
                        <label for="link" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Link Demo / Repository <span class="text-xs font-normal text-gray-500">(Opsional)</span></label>
                        <input type="url" name="link" id="link"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 !text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 font-medium"
                            placeholder="https://example.com">
                    </div>

                    <!-- Upload Gambar -->
                    <div>
                        <label for="image" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Upload Gambar Project</label>
                        <input type="file" name="image" id="image" accept="image/*" required
                            class="w-full text-sm text-gray-700 dark:text-gray-300 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                    </div>

                    <!-- Tombol Aksi Bawah -->
                    <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-300 bg-gray-100 hover:bg-gray-200 !text-gray-800 text-sm font-bold transition">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 !text-white font-bold rounded-lg text-sm shadow-md transition">
                            Simpan Proyek
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>