@extends('layouts.admin')

@section('title', 'All Shipments')

@section('content')
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200">
        <div class="mb-1 w-full">
            {{-- Breadcrumbs and Title (Kept same as original) --}}
            <div class="mb-4">
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Shipment Management</h1>
            </div>

            <div class="sm:flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                    <form class="lg:pr-3" action="{{ route('admin.shipments.index') }}" method="GET" id="search-form">
                        <label for="shipment-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-64 xl:w-96">
                            {{-- Added ID for JS targeting --}}
                            <input type="text" name="search" id="shipment-search" value="{{ request('search') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Search by Tracking Number">
                        </div>
                    </form>
                </div>
                {{-- Add Button --}}
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <a href="{{ route('admin.shipments.create') }}"
                        class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add Shipment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Tracking
                                    Number</th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Receiver
                                    Name</th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Destination</th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Status
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">Actions
                                </th>
                            </tr>
                        </thead>

                        {{-- ID added to tbody for AJAX updates --}}
                        <tbody id="shipments-table-body" class="bg-white divide-y divide-gray-200">
                            @include('admin.shipments.partials.table_rows')
                        </tbody>

                        <tfoot class="bg-white">
                            <tr>
                                <td colspan="5" class="p-4">
                                    {{-- ID added to container to update pagination links --}}
                                    <div id="pagination-container" class="px-4 py-3">
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
            let timer;

            $('#shipment-search').on('keyup', function () {
                clearTimeout(timer);
                let query = $(this).val();

                // Debounce: Wait 500ms after user stops typing
                timer = setTimeout(function () {

                    // Show a loading state (optional UI enhancement)
                    $('#shipments-table-body').addClass('opacity-50');

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

                            // Remove loading state
                            $('#shipments-table-body').removeClass('opacity-50');

                            // Update URL without reloading (optional, good for UX)
                            let newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?search=' + query;
                            window.history.pushState({ path: newUrl }, '', newUrl);
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