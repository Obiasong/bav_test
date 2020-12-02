<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('auth.dashboard')
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-10 sm:justify-start sm:pt-0" >
            <h1 style="font-size: 20px;padding-top: 15px;">
            @lang('auth.dashboard')
            </h1>
        </div>
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid">
                <div class="p-6">
                    <div class="flex items-center">
                        <img height="30px" width="25px" src="{!!asset('images/direct.png')!!}"/>
                        <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5c1.606v100 0 3.332.477 4.5 1.253v13C19.832 18.477 18.333 22 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> -->
                        <div class="ml-4 text-lg leading-7 font-semibold"> @lang('auth.dashboard')</div>
                    </div>
                </div>
                <div class="p-6 border-t border-green-200 dark:border-green-700 md:border-l">
                    <div class="ml-6">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <img src="{!!asset('images/Bridge_logo.png')!!}"/>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                  <h3>@lang('product/product.user_products')</h3>
                      {!! $product_list !!}
                </div>
                <div class="p-6">
                </div>
            </div>
        </div>

    <!-- <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div> -->

    </div>
    {{--    <div class="py-6">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
    {{--                 {!! $product_list !!}--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


</x-app-layout>
