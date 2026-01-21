@extends('layouts.admin')

@section('title', 'All Shipments')

@section('content')
    <div
        class="p-4 block sm:flex items-center justify-between transition-colors">
        <div class="mb-1 w-full">

            <div class="mb-4">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white">Shipment Management</h1>
            </div>

            <div class="sm:flex sm:justify-between">
                <div
                    class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 dark:sm:divide-gray-700 sm:mb-0">
                    <form class="lg:pr-3" action="{{ route('admin.shipments.index') }}" method="GET" id="search-form">
                        <label for="shipment-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-64 xl:w-96">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i data-lucide="search" class="w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <input type="text" name="search" id="shipment-search" value="{{ request('search') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full pl-10 p-2.5 
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500 transition-colors"
                                placeholder="Search by Tracking Number">
                        </div>
                    </form>
                </div>

                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <a href="{{ route('admin.shipments.create') }}"
                        class="w-full text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto dark:focus:ring-cyan-800 transition-colors">
                        <i data-lucide="plus" class="w-5 h-5 mr-2 -ml-1"></i>
                        Add Shipment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700 border-r border-l border-gray-200 dark:border-gray-700 rounded-lg">
                            <tr>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Tracking Number
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Receiver Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Destination
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody id="shipments-table-body"
                            class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @include('admin.shipments.partials.table_rows')
                        </tbody>

                        <tfoot class="bg-white dark:bg-gray-800 border-r border-l border-gray-200 dark:border-gray-700 rounded-lg">
                            <tr>
                                <td colspan="5" class="p-4 border-t border-gray-200 dark:border-gray-700">
                                    <div id="pagination-container">
                                        {{ $shipments->appends(request()->query())->links() }}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initial Icon Load
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            let timer;

            $('#shipment-search').on('keyup', function () {
                clearTimeout(timer);
                let query = $(this).val();

                // Debounce: Wait 500ms after user stops typing
                timer = setTimeout(function () {

                    // Show a loading state (reduce opacity)
                    $('#shipments-table-body').addClass('opacity-50 transition-opacity duration-200');

                    $.ajax({
                        url: "{{ route('admin.shipments.index') }}",
                        type: "GET",
                        data: {
                            search: query
                        },
                        success: function (response) {
                            // 1. Update the table rows
                            $('#shipments-table-body').html(response.html);

                            // 2. Update the pagination links
                            $('#pagination-container').html(response.pagination);

                            // 3. Remove loading state
                            $('#shipments-table-body').removeClass('opacity-50');

                            // 4. Update URL without reloading
                            let newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?search=' + query;
                            window.history.pushState({ path: newUrl }, '', newUrl);

                            // 5. CRITICAL: Re-initialize Lucide icons for the new HTML
                            if (typeof lucide !== 'undefined') {
                                lucide.createIcons();
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                            $('#shipments-table-body').removeClass('opacity-50');
                        }
                    });
                }, 500);
            });
        });
    </script>
@endpush