<style> 
    .read {
        pointer-events: none; /* Disable pointer events */
        color: grey !important;
    }
</style>

<x-app-layout>
    <div class="main" style="display: grid; overflow-y: auto; max-width: 100%; margin-left: 50px">
        <div class="w-full h-full flex flex-col px-18 py-10 gap-5 ">
            <h1 class="form-title" style="font-size: 24px; font-weight: 600;">NOTIFICATION LOG</h1>
        </div>
        <div class="bg-white overflow-auto shadow-md sm:rounded-lg" style="margin-right: 50px">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 " style="font-size: 15px;">
                    <tr>
                        <th scope="col" class="px-6 py-3" style="padding-right: 30px; padding-left: 30px;">
                            DATE
                        </th>
                        <th scope="col" class="px-6 py-3" style="padding-right: 30px; padding-left: 30px;">
                            TRAFO ID
                        </th>
                        <th scope="col" class="px-6 py-3" style="padding-right: 30px; padding-left: 30px;">
                            MESSAGE NOTIFICATION
                        </th>
                        <th scope="col" class="px-6 py-3" style="padding-right: 30px; padding-left: 30px;">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                            {{$notification->updated_at}}
                        </th>
                        <td class="px-6 py-4">
                            {{$notification->data['trafo_number']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$notification->data['message']}}
                        </td>
                        <td class="px-6 py-4 flex flex-col justify-center items-center gap-3">
                            <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none underline">View Data</a>
                            <form action="{{ route('markNotification') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $notification->id }}">
                                <button type="submit" class="font-bold text-blue-800 text-decoration-none underline mark-as-read @if($notification->read_at) read @endif">
                                    Mark as Read
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- @if(auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role === 'manager')) -->
    <script>
        $(function() {
            $('.mark-as-read').click(function(event) {
                event.preventDefault(); // Prevent default form submission
                // Submit the form containing the notification ID
                $(this).addClass('read').prop('disabled', true);
                $(this).closest('form').submit();
            });
        });
    </script>
    <!-- @endif -->

</x-app-layout>
