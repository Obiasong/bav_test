<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('auth.manage_products')
        </h2>
    </x-slot>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-10 sm:justify-start sm:pt-0"><br>
            <h1 style="font-size: 20px;padding-top:15px;">
                Create Product
            </h1>
        </div>
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <a class="btn btn-red text-sm text-gray-600 hover:text-gray-900" style="background-color: red; color: white" href="{{url('manage_products/')}}" style="float: right;background-color: dodgerblue;color: white">
                       Return
                    </a>
                    @if (count($errors)>0)
                        <div class="p-6">
                        </div>
                        <div class="p-6">
                        </div>
                        <ul class="">
                            @foreach ($errors->all() as $error)
                                <li style="background-color: red;padding: 5px;color: white">{!! $error !!}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(session('status'))
                        <div class="p-6">
                        </div>
                        <div class="p-6">
                        </div>
                        {!! session('status') !!}
                    @endif
                    <br>
                    <h1 style="font-size: 20px;padding-top:15px;text-align: center">
                        Create A New Product
                    </h1>
                    <br>
                    <form method="POST" action="{{ '/manage_products/create'}}" ENCTYPE="multipart/form-data">
                        @csrf
                        <div>
                            <x-jet-label for="name" value="Enter Product Name"/>
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                         value="" required autofocus autocomplete="name"/>
                        </div><br/>
                        <div>
                            <x-jet-label for="description" value="Product Description"/>
                            <textarea id="description" name="description" required autofocus class="block mt-1 w-full"
                            placeholder="Enter a Short description of your product here." autocomplete="description"></textarea>
                        </div><br/>
                        <div>
                            <x-jet-label for="price" value="Enter Cost of Product(XAF)"/>
                            <x-jet-input id="price" class="block mt-1 w-full" type="number" name="price"
                            value="0.00" required autofocus autocomplete="price" step="0.01"/>
                        </div><br/>
                        <div class="flex  justify-center mt-4">
                            <x-jet-button class="btn btn-blue" style="background-color: dodgerblue;text-align: center">
                                Create
                            </x-jet-button>
                        </div>

                </div>
                <div class="p-6 border-t border-green-200 dark:border-green-700 md:border-l">
                    <div class="ml-6">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <img src="{!!asset('images/Bridge_logo.png')!!}"/>
                        </div>
                    </div><br/><br>
                    <div>
                        <x-jet-label for="product_image" value="Upload an Image of the Product"/><br/>
                        <input type="file" name="product_image" class="block mt-2 form-control-file">
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
    <style>
        .btn {
            @apply font-bold py-2 px-4 rounded;
            padding: 8px;
            width: 22%;
            text-align: center;
            border-radius: 2px;
        }

        .btn-blue {
            @apply bg-blue-500 text-white;
        }

        .btn-blue:hover {
            @apply bg-blue-700;
        }

        .btn-red {
            background-color: red;
        }

        .btn-blue:hover {
            @apply bg-blue-700;
        }
    </style>
</x-app-layout>
