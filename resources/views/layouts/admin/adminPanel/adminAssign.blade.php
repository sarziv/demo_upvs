@if(empty($orders[0]))
    <h4 class="text-center">Priskyrimų daugiau nėra.</h4>
@else
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order_name</th>
            <th scope="col">Status</th>
            <th scope="col">Technician</th>
            <th scope="col" class="text-center">Assign</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($orders as $order)
                <form method="post" action="{{ route('admin.assignOrder',$order->id) }}">
                    @csrf
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->order_name}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <select name="tech" class="form-control">
                            @foreach($techs as $tech)
                                <option name="tech" value="{{$tech->id}}">{{$tech->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-center">
                        <button type="submit" class="btn btn-outline-light">Assign</button>
                    </td>
                </form>
            @endforeach
        </tr>
        </tbody>
    </table>
@endif
