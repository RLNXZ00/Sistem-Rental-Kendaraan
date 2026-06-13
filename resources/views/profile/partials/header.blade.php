<!-- Hero Profile Header -->
<section class="relative mb-stack-lg">
    <div class="h-48 md:h-64 rounded-xl overflow-hidden bg-primary-container relative">
        <div class="absolute inset-0 opacity-40 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-secondary-container via-primary-container to-primary"></div>
        <div class="absolute bottom-4 right-4">
            <button class="bg-surface/20 backdrop-blur-md text-on-primary border border-white/20 px-4 py-2 rounded-lg text-label-md flex items-center gap-2 hover:bg-surface/30 transition-all">
                <span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
                Edit Cover
            </button>
        </div>
    </div>
    <div class="flex flex-col md:flex-row items-end px-4 md:px-8 -mt-16 md:-mt-20 gap-6">
        <div class="relative">
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-surface bg-surface shadow-lg overflow-hidden">
                <img alt="Avatar" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnk9M45vqNzdJs-VzSLlKph18luOAiCbpqQw7grs5lExzZk_By7Px8SOsAzP3rEidGZJkyXWw7RtP_nPLfhWHVRhBbIDGirVS5CidnDI3p5s3lwS0QWBJrbA-IYq97w_ouOKHblh4a9CNIn_SHBmkHbmkPgU8gNjDfzgubtMGNkr6NWBtK4788rBBIPgB4dvqN7Qzxnnq-nrSmIcjm0JZ9AGn1EAFshozJNkqTMVW6zI7vzw2878vRKjp5ePUShP2jUpjV0rsKnVs"/>
            </div>
            <button class="absolute bottom-2 right-2 p-2 bg-secondary-container text-on-primary rounded-full shadow-lg hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-[20px]" data-icon="photo_camera">photo_camera</span>
            </button>
        </div>
        <div class="flex-1 pb-4 text-center md:text-left">
            <h1 class="font-headline-lg text-headline-lg text-on-surface">{{ auth()->user()->name ?? 'Aditya Pratama' }}</h1>
            <p class="font-body-md text-on-surface-variant flex items-center justify-center md:justify-start gap-2">
                {{ auth()->user()->email ?? 'aditya.pratama@email.com' }}
                <span class="bg-success/10 text-success text-[10px] uppercase font-bold px-2 py-0.5 rounded-full">Verified</span>
            </p>
        </div>
        <div class="pb-4 flex gap-3">
            <button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md flex items-center gap-2 hover:translate-y-[-2px] transition-transform shadow-sm">
                <span class="material-symbols-outlined text-[20px]" data-icon="save">save</span>
                Simpan Perubahan
            </button>
        </div>
    </div>
</section>
