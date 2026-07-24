<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portofolio {{ $about->name ?? 'Adit' }} | {{ $about->role ?? 'Fullstack Developer' }}</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-['Plus_Jakarta_Sans',sans-serif] antialiased selection:bg-teal-500 selection:text-slate-900">

  <header class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-slate-950/80 border-b border-slate-800/80">
    <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
      
      <a href="#" class="flex items-center gap-3">
        <img src="{{ asset('images/foto-profil.jpg') }}" alt="Logo {{ $about->name ?? 'Adit' }}" class="w-20 h-20 object-contain rounded-lg">
        <span class="text-xl font-bold tracking-tight text-white flex items-center gap-1">
          
        </span>
      </a>

      <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-400"> 
        <a href="#about" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-teal-400 border border-teal-500/30 text-xs font-bold rounded-lg transition">Tentang</a>
        <a href="#projects" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-teal-400 border border-teal-500/30 text-xs font-bold rounded-lg transition">Proyek</a>
        <a href="#skills" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-teal-400 border border-teal-500/30 text-xs font-bold rounded-lg transition">Keahlian</a>
        <a href="#contact" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-teal-400 border border-teal-500/30 text-xs font-bold rounded-lg transition">Kontak</a>
      </nav>
      <div class="flex items-center gap-4">
    @if (Route::has('login'))
        @auth
            <!-- Jika SUDAH Login, Tampilkan Tombol ke Dashboard Admin -->
            <a href="{{ route('admin.projects.index') }}" 
               class="px-5 py-2.5 rounded-full text-sm font-semibold bg-teal-500 hover:bg-teal-400 text-slate-950 transition-all shadow-lg shadow-teal-500/20">
                 Login Dashboard
            </a>
        @else
            <!-- Jika BELUM Login, Tampilkan Tombol Login -->
            <a href="{{ route('login') }}" 
               class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-teal-400 border border-teal-500/30 text-xs font-bold rounded-lg transition">
                Masuk / Login
            </a>
        @endauth
    @endif
  </header>

  <main class="pt-20">
    <section id="about" class="min-h-[calc(100vh-5rem)] flex items-center justify-center relative overflow-hidden px-6 py-20">
      <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>

      <div class="max-w-4xl mx-auto text-center space-y-8 relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-teal-500/30 bg-teal-500/10 text-teal-300 text-xs font-semibold uppercase tracking-wider">
          <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
          {{ $about->badge_text ?? 'Siap Menerima Proyek Baru' }}
        </div>

        
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-tight text-slate-100 max-w-3xl mx-auto">
          {{ $about->headline ?? 'Mengembangkan Solusi Web Modern & Efisien.' }}
        </h1>
        
        <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto font-normal leading-relaxed">
          {{ $about->bio ?? 'Halo, saya Muhamad Aditiya. Seorang Web Developer yang berfokus pada pembuatan aplikasi web performa tinggi, rapih, dan mudah digunakan.' }}
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
          <a href="#projects" class="w-full sm:w-auto px-8 py-3.5 rounded-xl font-semibold bg-slate-100 hover:bg-white text-slate-900 transition-all shadow-md">
            Lihat Portfolio
          </a>
          <a href="#contact" class="w-full sm:w-auto px-8 py-3.5 rounded-xl font-semibold border border-slate-800 hover:bg-slate-900 text-slate-300 transition-all">
            Kontak Langsung
          </a>
        </div>
      </div>
    </section>

    <section id="projects" class="py-24 max-w-6xl mx-auto px-6 border-t border-slate-800/60">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
        <div>
          <h2 class="text-xs font-bold uppercase tracking-widest text-teal-400 mb-2">Portfolio</h2>
          <p class="text-3xl font-bold text-slate-100">Proyek Unggulan</p>
        </div>
        <p class="text-slate-400 text-sm max-w-md">Beberapa proyek web yang telah saya kembangkan dengan teknologi terbaru.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- BENAR --}}
        @foreach($projects as $project)
          <div class="group relative bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden hover:border-slate-700 transition-all flex flex-col justify-between">
            <div>
              <div class="aspect-video bg-slate-800 overflow-hidden relative">
                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
              </div>
              <div class="p-6 space-y-4">
                <div class="flex items-center gap-2 flex-wrap">
                  @foreach($project->tech_stack as $tech)
                    <span class="text-xs px-2.5 py-1 rounded-md bg-teal-500/10 text-teal-400 font-medium">{{ $tech }}</span>
                  @endforeach
                </div>
                <h3 class="text-xl font-bold text-slate-100 group-hover:text-teal-400 transition-colors">{{ $project->title }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">{{ $project->description }}</p>
              </div>
            </div>
            <div class="p-6 pt-0">
              <a href="{{ $project->link ?? '#' }}" class="inline-flex items-center gap-2 text-sm font-semibold text-teal-400 hover:underline">
                Lihat Detail <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </section>

    <section id="skills" class="py-24 max-w-6xl mx-auto px-6 border-t border-slate-800/60">
      <h2 class="text-xs font-bold uppercase tracking-widest text-teal-400 mb-2">Keahlian</h2>
      <p class="text-3xl font-bold text-slate-100 mb-12">Teknologi yang Digunakan</p>

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach($skills as $skill)
          <div class="p-4 bg-slate-900/40 border border-slate-800 rounded-xl flex items-center gap-3">
            <i data-lucide="{{ $skill->icon }}" class="w-6 h-6 text-teal-400"></i>
            <span class="font-medium text-slate-200">{{ $skill->name }}</span>
          </div>
        @endforeach
      </div>
    </section>

    <!-- SECTION KONTAK -->
        <section id="contact" class="py-20 max-w-4xl mx-auto px-4 sm:px-6 text-center border-t border-slate-800/60">
            <h2 class="text-xs font-bold uppercase tracking-widest text-teal-400 mb-2">KONTAK</h2>
            <h3 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Mari Bekerja Sama</h3>
            <p class="text-slate-400 max-w-xl mx-auto mb-8 text-sm">
                Punya ide project atau ingin berdiskusi? Jangan ragu untuk menghubungi saya melalui Email,atau WhatsApp dibawah ini.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <!-- Tombol Email -->
                <a href="mailto:{{ $about->email ?? 'email@example.com' }}" 
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold rounded-xl transition shadow-lg shadow-teal-500/20">
                    <i data-lucide="mail" class="w-4 h-4"></i> Kirim Email
                </a>

                <!-- Tombol WhatsApp / Telepon -->
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $about->phone ?? '6281234567890') }}" 
                   target="_blank" 
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-slate-800 hover:bg-slate-700 text-teal-400 border border-teal-500/30 hover:border-teal-400 font-bold rounded-xl transition">
                    <i data-lucide="phone" class="w-4 h-4"></i> {{ $about->phone ?? '0856-0028-8060' }}
                </a>
            </div>
        </section>
  </main>

  <footer class="border-t border-slate-800/60 py-8 text-center text-xs text-slate-500">
    <p>&copy; {{ date('Y') }} {{ $about->name ?? 'Aditiya' }}. Dibuat dengan Laravel &amp; Tailwind CSS.</p>
  </footer>

  <script>
    lucide.createIcons();
  </script>
</body>
</html>