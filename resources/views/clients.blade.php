

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client List') }}
        </h2>
    </x-slot>


    <script src="{{ asset('js/app.js') }}"></script>


    <script>
        document.querySelectorAll('a.show-addresses-button').forEach(function(element) {
            element.addEventListener('click', function (e) {
                e.preventDefault();
                let clientId = this.getAttribute('data-client-id');

                // Make the HTTP request to your Laravel back-end to get the client addresses
                axios.get('/client/' + clientId + '/addresses')
                    .then(function (response) {
                        // update the addresses element with the returned data
                        document.querySelector('#addresses').innerHTML = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        });
    </script>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





                    <div class="grid grid-cols-2">

                        <div class="col-span-1 ">


                            <table class="border-collapse">

                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-">
                                        Client name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Addresses
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deliveries
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 text-base whitespace-nowrap dark:text-dark">
                                        {{$client->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="#" class="show-addresses-button" data-client-id="{{$client->id}}">Show addresses</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/client/{{$client->id}}/deliveries" class="font-medium text-base text-blue-100 dark:text-blue-500 hover:underline">Open deliveries</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $clients->links()}}
                        </div>
                        <div id="addresses"></div>

                        <script>
                            document.querySelectorAll('a.show-addresses-button').forEach(function(element) {
                                element.addEventListener('click', function (e) {
                                    e.preventDefault();
                                    let id = this.getAttribute('data-client-id');

                                    axios.get('/client/' + id + '/addresses')
                                        .then(function (response) {
                                            let addresses = '';
                                            response.data.forEach(function(address) {
                                                addresses += address.title + '<br>';
                                            });
                                            document.querySelector('#addresses').innerHTML = addresses;
                                        })
                                        .catch(function (error) {
                                            console.log(error);
                                        });
                                });
                            });
                        </script>

                        <div class="col-span-1 mx-auto" >
                            <ul class="list-inside">

                                    <li id="addresses"></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
