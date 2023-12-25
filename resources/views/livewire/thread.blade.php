<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img src="{{ $thread->user->avatar_img }}" alt="{{ $thread->user->name }}" class="rounded-md">
            </div>
            <div class="w-full">
                <h2 class="mb-4 flex items-start justify-between">
                    <a href="" class="text-xl font-semibold text-white/90">
                        {{ $thread->title }}
                    </a>
                    <span
                        class="rounded-full text-xs py-2 px-4 capitalize"
                        style="color: {{ $thread->category->color }}; border: 1px solid {{ $thread->category->color }};"
                    >
                        {{ $thread->category->name }}
                    </span>
                </h2>
                <p class="mb-4 text-blue-600 font-semibold text-xs">
                    {{ $thread->user->name }}

                    <span class="text-white/90">{{ $thread->created_at->diffForHumans() }}</span>
                </p>
                <p class="text-white/60">
                    {{ $thread->body }}
                </p>
            </div>
        </div>
    </div>

    <!-- respuestas -->

    <!-- formulario -->
    <form method="post" wire:submit.prevent="replyPost" class="flex gap-x-3">
        <input
            type="text" placeholder="Escriba una respuesta..."
            class="bg-slate-800 border-0 rounded-md w-full p-3 text-white/60 text-xs"
            wire:model="body"
        >
        <button type="submit" class="rounded-lg border text-amber-300 px-3 py-2 border-amber-300" x-on:click="$wire.$refresh()">Respuesta</button>
    </form>
</div>
