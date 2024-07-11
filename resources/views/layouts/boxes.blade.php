<div class="mt-8 max-w-full gap-6 px-3 py-5 flex flex-col md:flex-row gap-2 justify-between" >
    <div class="flex flex-col md:flex-row relative items-start justify-between gap-8 mt-10 ">
        @php
            $count = 0;
        @endphp
        @foreach ($boxes as $box)
            <div
                class="w-96 relative  px-4 pt-16 pb-8 bg-white rounded bg-green-50">
                @if ($count == 0)
                    <div
                        class="absolute top-0 left-1/2 -translate-x-1/2 rounded-bl rounded-bxl  text-white px-8 py-2 bg-[#172B03] transition-all duration-150 ease-in group-hover:shadow-[0px_14px_28px_-5px_rgba(0,0,0,0.1)]">
                        Melhor Opção
                    </div>
                @endif
                <h2
                    class="text-center font-semibold text-lg tracking-wider mb-3 drop-shadow-[3px_3px_5px_rgba(91,91,91,0.58)]">
                    {{ $box['instituicaoFinanceira'] }}</h2>
                    <h6  class="text-center text-[#172B03] text-sm tracking-wider mb-3 drop-shadow-[3px_3px_5px_rgba(91,91,91,0.58)]"> {{ ucfirst($box['modalidadeCredito']) }} </h6>
                <p class="text-center tracking-tighter block mb-14">
                    <span class="text-3xl font-bold">R$
                        {{
                            number_format($box['valorParcela'], 2, ',', '.')
                        }}
                    </span>
                    <span class="text-black/40 text-center">/{{ $box['qntParcelas'] }}x</span>
                </p>
                <button
                    class="w-full p-2 bg-[#99EF34] text-white rounded-md font-semibold hover:bg-[#172B03] transition-all duration-150 ease-in mb-8 border-[#99EF34]">Eu quero essa oferta</button>
                <ol class=" text-[#172B03] w-[80%] mx-auto">
                    <li><span class="text-black text-xs font-semibold">Valor Liberado: R$ {{ number_format($box['valorSolicitado'], 2, ',', '.') }}</span></li>
                    <li><span class="text-black text-xs font-semibold">Juros /mês: {{ number_format($box['taxaJuros'], 2, ',', '.') }}</span></li>
                    <li><span class="text-black text-xs font-semibold">Valor total a ser pago: R$ {{ number_format($box['valorAPagar'], 2, ',', '.') }}</span></li>
                </ol>
            </div>
            @php
                $count++;
            @endphp
        @endforeach
        </div>
</div>
