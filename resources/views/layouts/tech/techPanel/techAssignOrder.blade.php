@if(empty($orderInitialize[0]))
            <h4 class="text-center">Užsakymų nėra.</h4>
        @else
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order_name</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Assign</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orderInitialize as $order)
                    <tr>
                        <form method="post" action="{{ route('tech.assignOrder',$order->id) }}">
                            @csrf
                            <th scope="row">{{$order->id}}</th>
                            <th>{{$order->order_name}}</th>
                            <th>{{$order->status}}</th>
                            <th class="text-center">
                                <button type="submit" class="btn btn-outline-light">Assign</button>
                            </th>
                        </form>
                    @endforeach
                </tr>
                </tbody>
            </table>
@endif
