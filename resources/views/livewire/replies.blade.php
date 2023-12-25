<div>
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
        <div class="p-4 flex flex-col gap-4">
            <div class="flex justify-between">
                <img src="{{ $reply->user->avatar_img }}" alt="{{ $reply->user->name }}" class="rounded-md h-10">
                <p class="mt-4 text-white/60 text-xs flex gap-2 justify-end">
                    @if(is_null($reply->reply_id))
                    <a href="#" class="hover:text-white" wire:click.prevent="$toggle('is_responding')">Responder</a>
                    @endif
                    <a href="#" class="hover:text-white" wire:click.prevent="$toggle('is_editing')">Editar</a>
                </p>
            </div>
            <div class="w-full">
                <p class="mb-2 text-blue-600 font-semibold text-xs">
                    {{ $reply->user->name }}
                </p>
                @if($is_editing)
                <div>
                    <!-- formulario -->
                    <form method="post" wire:submit.prevent="replyChild" class="flex flex-col items-end gap-y-3">
                        <input
                            type="text" placeholder="Escriba una respuesta..."
                            class="bg-slate-800 border border-slate-600 rounded-md w-full p-3 text-white/60 text-xs"
                            wire:model="body"
                        >
                        <button type="submit" class="rounded-lg border text-amber-300 px-3 py-2 border-amber-300 w-2/12" x-on:click="$wire.$refresh()">Respuesta</button>
                    </form>
                </div>
                @else
                <p class="text-white/60 text-xs">
                    {{ $reply->body }}
                </p>
                @endif
            </div>
            @if($is_responding)
            <div>
                <!-- formulario -->
                <form method="post" wire:submit.prevent="replyChild" class="flex flex-col items-end gap-y-3">
                    <input
                        type="text" placeholder="Escriba una respuesta..."
                        class="bg-slate-800 border border-slate-600 rounded-md w-full p-3 text-white/60 text-xs"
                        wire:model="body"
                    >
                    <button type="submit" class="rounded-lg border text-amber-300 px-3 py-2 border-amber-300 w-2/12" x-on:click="$wire.$refresh()">Respuesta</button>
                </form>
            </div>
            @endif
        </div>

    </div>
    <div class="ml-14">
    @foreach($reply->replies as $item)
        @livewire('replies', ['reply' => $item], key('reply-'.$item->id))
    @endforeach
    </div>
</div>
