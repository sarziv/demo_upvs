@if(empty($processOrders[0]))
    <h4 class="text-center">Užbaigtų procesų nėra.</h4>
@else
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Order_name</th>
            <th scope="col">Technician</th>
            <th scope="col">Technician Email</th>
            <th scope="col">Status</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Užtruko</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($processOrders as $order)
                    <th>{{$order->order_name}}</th>
                    <th>{{$order->name}}</th>
                    <td>{{$order->email}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->start_time}}</td>
                    <td>{{$order->end_time}}</td>
                    <td>{{
                    (strtotime($order->end_time)-strtotime($order->start_time)) ." seconds"
                    }}</td>
                </form>
            @endforeach
        </tr>
        </tbody>
    </table>
@endif
