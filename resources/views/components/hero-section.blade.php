<div class="mb-4">
    @switch(request()->query('type'))
        @case(null)
            <div class="flex">
                <div class="w-1/2">
                    <img class="rounded-e-full rounded-s-full border-2" src="{{ url('/') }}/storage/images/dowodzdj.jpg"
                        alt="Zdjęcie MonalizaBezRamy">
                </div>
                <div class="w-1/2 text-white p-3 flex flex-col justify-center gap-4">
                    <h1 class="text-3xl font-bold text-center">MonalizaBezRamy</h1>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quasi expedita modi
                        dicta fuga
                        aliquid
                        quaerat nam fugiat cum libero laboriosam, voluptatem ea earum dolorem animi explicabo eos atque
                        porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores sint velit ipsam in provident
                        sit excepturi praesentium vitae vero quasi voluptatem eaque nisi deserunt, laudantium laboriosam est
                        accusantium fuga eos.
                    </p>
                </div>
            </div>
        @break

        @case('taniec')
            <div class="text-white p-3">
                <h1 class="text-3xl font-bold text-center mb-4">Taniec</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quasi expedita modi
                    dicta fuga
                    aliquid
                    quaerat nam fugiat cum libero laboriosam, voluptatem ea earum dolorem animi explicabo eos atque
                    porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores sint velit ipsam in provident
                    sit excepturi praesentium vitae vero quasi voluptatem eaque nisi deserunt.
                </p>
            </div>
        @break

        @case('wierszem_pisane')
            <div class="text-white p-3">
                <h1 class="text-3xl font-bold text-center mb-4">Wierszem pisane</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quasi expedita modi
                    dicta fuga
                    aliquid
                    quaerat nam fugiat cum libero laboriosam, voluptatem ea earum dolorem animi explicabo eos atque
                    porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores sint velit ipsam in provident
                    sit excepturi praesentium vitae vero quasi voluptatem eaque nisi deserunt.
                </p>
            </div>
        @break

        @case('scenariusze_pisane_życiem')
            <div class="text-white p-3">
                <h1 class="text-3xl font-bold text-center mb-4">Scenariusze pisane życiem</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quasi expedita modi
                    dicta fuga
                    aliquid
                    quaerat nam fugiat cum libero laboriosam, voluptatem ea earum dolorem animi explicabo eos atque
                    porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores sint velit ipsam in provident
                    sit excepturi praesentium vitae vero quasi voluptatem eaque nisi deserunt.
                </p>
            </div>
        @break

        @case('z_medycznego_punktu_widzenia')
            <div class="text-white p-3">
                <h1 class="text-3xl font-bold text-center mb-4">Z medyczengo punktu widzenia</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat quasi expedita modi
                    dicta fuga
                    aliquid
                    quaerat nam fugiat cum libero laboriosam, voluptatem ea earum dolorem animi explicabo eos atque
                    porro. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores sint velit ipsam in provident
                    sit excepturi praesentium vitae vero quasi voluptatem eaque nisi deserunt.
                </p>
            </div>
        @break

        @default
    @endswitch
</div>
