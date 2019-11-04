@if(empty($ordersChange[0]))
    <h4 class="text-center">Priskyrimų daugiau nėra.</h4>
@else
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order_name</th>
            <th scope="col">Working</th>
            <th scope="col">Status</th>
            <th scope="col">Technician</th>
            <th scope="col" class="text-center">Assign</th>
        </tr>
        </thead>
        <tbody>

        @foreach($ordersChange as $change)
            <tr>
                <form method="post" action="{{ route('admin.assignOrder',$change->id) }}">
                    @csrf
                    <th scope="row">{{$change->id}}</th>
                    <td>{{$change->order_name}}</td>
                    <td>{{$change->name}}</td>
                    <td>{{$change->status}}</td>
                    <td>
                        <select name="tech" class="form-control">
                            @foreach($techs as $tech)
                                <option name="tech" value="{{$tech->id}}">{{$tech->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-center">
                        <button type="submit" class="btn btn-outline-light">Change</button>
                    </td>
                </form>
                @endforeach
            </tr>
        </tbody>
    </table>
@endif
