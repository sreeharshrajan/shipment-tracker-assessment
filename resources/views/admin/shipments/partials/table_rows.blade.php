@php
    use App\Constants\ShipmentStatus;
@endphp

@forelse($shipments as $shipment)
    <tr class="hover:bg-gray-100">
        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
            <div class="text-base font-semibold text-gray-900">{{ $shipment->tracking_number }}</div>
        </td>
        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
            {{ $shipment->receiver_name }}
        </td>
        <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
            {{ $shipment->destination_city }}
        </td>
        <td class="p-4 whitespace-nowrap">
            @php
                $statusClasses = match ($shipment->status) {
                    ShipmentStatus::PENDING => 'bg-yellow-100 text-yellow-800',
                    ShipmentStatus::TRANSIT => 'bg-blue-100 text-blue-800',
                    ShipmentStatus::DELIVERED => 'bg-green-100 text-green-800',
                    default => 'bg-gray-100 text-gray-800',
                };
            @endphp
            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusClasses }}">
                {{ ucfirst($shipment->status) }}
            </span>
        </td>
        <td class="p-4 whitespace-nowrap space-x-2">
            {{-- Using UUID for the show link --}}
            <a href="{{ route('admin.shipments.show', $shipment->id) }}"
                class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                View Details
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="p-4 text-center text-gray-500 italic">No shipments found.</td>
    </tr>
@endforelse

{{-- We return the pagination HTML in the request as well so it updates dynamicallly --}}
<tr id="pagination-links" class="hidden">
    <td colspan="5">
        {{ $shipments->appends(request()->query())->links() }}
    </td>
</tr>