@extends('layouts.default')
@section('title', 'Home - Simule Já - Soluções Financeiras para facilitar a sua vida')

@section('header')

@endsection
@section('content')
    <section id="hero">
        <div class="relative overflow-hidden">
            <div aria-hidden="true"
                class="flex absolute -top-96 start-1/2 transform -translate-x-1/2 lg:-top-64 lg:translate-x-0">
                <div
                    class="bg-gradient-to-r from-green-100/50 to-green-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
                </div>
                <div
                    class="bg-gradient-to-tl from-green-50/50 to-green-50 blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem]">
                </div>
            </div>
            @component('layouts.navbar')
            @endcomponent
            <div class="relative z-10">
                <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-6 py-10 lg:py-16">
                    <div class="max-w-2xl text-center mx-auto">
                        <div class="mt-6 max-w-2xl mb-5">
                            <h1 class="block font-bold text-green-800 text-4xl md:text-5xl lg:text-6xl">
                                Simule sua <span class="text-green-500">análise de crédito </span>agora!
                            </h1>
                        </div>
                        <div class="mt-8 max-w-3xl">
                            <p class="mt-8 text-lg text-gray-600">Um sistema que visa facilitar e gerenciar sua análise de
                                crédito, consulte quais instituições financeiras oferecem crédito para você.</p>
                        </div>
                        <div class="mt-8 max-w-3xl gap-6">
                            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="#">
                                Simular agora!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="simulador">
        @component('layouts.form')
        @endcomponent
    </section>
    <section id="resultado" class="hidden">
        <div class="container flex flex-col mx-auto">
            <div class="w-full relative mt-8 mb-8 px-3 py-4">
                <div class="w-full">
                    <h2 class="font-bold text-4xl text-green-800">Suas ofertas de crédito</h2>
                </div>
                <div class="hidden mt-8 max-w-3xl gap-6 px-3 py-4 flex flex-col md:flex-row gap-2 justify-between" id="loader">
                    <div class="w-full  px-10 pt-16 pb-8 bg-white rounded-lg self-stretch">
                        <div class="max-w-sm  shadow-lg animate-pulse">
                            <div class="px-3 py-4 flex flex-col justify-center  ">
                                <div class="w-32 mx-auto h-6 bg-gray-200 mb-3"></div>
                                <div class="h-10 w-64 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full  px-10 pt-16 pb-8 bg-white rounded-lg self-stretch">
                        <div class="max-w-sm  shadow-lg animate-pulse">
                            <div class="px-3 py-4 flex flex-col justify-center  ">
                                <div class="w-32 mx-auto h-6 bg-gray-200 mb-3"></div>
                                <div class="h-10 w-64 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full  px-10 pt-16 pb-8 bg-white rounded-lg self-stretch">
                        <div class="max-w-sm  shadow-lg animate-pulse">
                            <div class="px-3 py-4 flex flex-col justify-center  ">
                                <div class="w-32 mx-auto h-6 bg-gray-200 mb-3"></div>
                                <div class="h-10 w-64 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>
                                <div class="h-6 w-32 bg-gray-300 mb-2"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="boxes">
                    
                </div>
            </div>
        </div>
    </section>
@endsection
