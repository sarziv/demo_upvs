<form method="post" action="{{ route('user.create') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Order name</label>
        <input type="text" name="order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Order name">
    </div>
    <diV class="text-center">
        <button type="submit" class="btn btn-primary">Order</button>
    </diV>
</form>
