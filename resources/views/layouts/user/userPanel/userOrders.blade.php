@if(empty($myOrders[0]))
    <h4 class="text-center">Užsakymų neturiu.</h4>
@else
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Order_name</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

            @foreach($myOrders as $myOrder)
                <tr>
                <td>{{$myOrder->order_name}}</td>
                <td>{{$myOrder->status}}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
@endif
