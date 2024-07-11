<div class="container mx-auto">
    <div class="flex flex-col text-center md:text-left md:flex-row  justify-center md:items-center">
        <div class="w-64 md:w-3/4  mx-auto md:mx-0">
            <div class="bg-white p-10 flex flex-col w-full shadow-xl rounded-xl">
                
                    <div class="flex flex-col md:flex-row gap-2 relative justify-between">
                        <div class="w-full">
                            <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900">CPF*</label>
                            <input type="text" id="cpf" placeholder="000.000.000-00" class="w-full appearance-none border-2 border-green-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg">
                        </div>
                        <div class="w-full">
                            <label for="valor" class="block mb-2 text-sm font-medium text-gray-900">Valor*</label>
                            <input type="text" id="valor" placeholder="R$" class="w-full appearance-none border-2 border-green-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg">
                        </div>
                        <div class="w-full">
                            <label for="qntParc" class="block mb-2 text-sm font-medium text-gray-900">Quantidade de parcelas</label>
                            <input type="number" id="qntParc" maxlength="2" placeholder="0" class="w-full appearance-none border-2 border-green-100 rounded-lg px-4 py-3 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:shadow-lg">
                        </div>
                        <div class="flex justify-center " style="align-items: flex-end">

                            <button type="button" id="sendData" data-routeConsulta="{{ route('api.consulta') }}" data-routeBoxes="{{ route('api.render.boxes') }}" class="w-full py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700">Simular</button>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>