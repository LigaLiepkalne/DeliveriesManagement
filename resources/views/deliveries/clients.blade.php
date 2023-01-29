<style>
    .py-12 {
        display: grid;
        grid-template-columns: auto auto;

    }

    main {
        width: 60%;
        margin: auto;
    }

    .second {
        width: available;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Client List
        </h2>
    </x-slot>

    <div class="d-flex justify-content-center py-12" style="display: inline-flex;">
        <div class=" justify-content-center align-items-center">
            <div class=" mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="border-collapse">
                            <thead>
                            <tr>
                                <th class="text-xl text-gray-600 uppercase bg-gray-50 dark:bg-gray-700 pb-3">
                                    Client name
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 text-base whitespace-nowrap dark:text-dark">
                                        {{ $client->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                    <a href="#" class="show-addresses-button uppercase" style="color: lightslategray; font-weight: bold"
                                           data-client-id="{{ $client->id }}">Show addresses</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/client/{{$client->id}}/deliveries"
                                           class="uppercase" style="color: lightslategray; font-weight: bold">
                                            Open deliveries
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-2"> {{ $clients->links() }}</div>
            </div>
        </div>

        <div class="py-12 second">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table>
                            <td id="addresses"></td>
                            <p class="text-xs font-semibold text-gray-700 uppercase mb-4">Client addresses</p>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('a.show-addresses-button').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.preventDefault();
                let id = this.getAttribute('data-client-id');

                axios.get('/client/' + id + '/addresses')
                    .then(function (response) {
                        let addresses = '';
                        response.data.forEach(function (address) {
                            addresses += address.title + '<br>';
                        });
                        document.querySelector('#addresses').innerHTML = addresses;
                        if (addresses === '') {
                            document.querySelector('#addresses').innerHTML = 'No addresses found';
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        });
    </script>
</x-app-layout>
