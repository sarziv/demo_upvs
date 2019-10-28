<form method="post" action="{{ route('admin.register') }}">
    @csrf
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="type" id="option1" value="tech" autocomplete="off" checked> Technician
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="type" id="option2" value="user" autocomplete="off"> User
        </label>
    </div>
    <diV class="text-center">
        <button type="submit" class="btn btn-primary">Create</button>
    </diV>
</form>
