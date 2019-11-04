@if(empty($assignedOrder[0]))
    <h4 class="text-center">Užsakymų nėra.</h4>
@else
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order_name</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Complete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($assignedOrder as $assigned)
            <tr>
                <form method="post" action="{{ route('tech.complete',$assigned->id) }}">
                    @csrf
                    <th scope="row">{{$assigned->id}}</th>
                    <td>{{$assigned->order_name}}</td>
                    <td>{{$assigned->status}}</td>
                    <td class="text-center">
                        <button type="submit" class="btn btn-outline-light">Complete</button>
                    </td>
                </form>
            @endforeach
        </tr>
        </tbody>
    </table>
@endif
