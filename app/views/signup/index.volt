<form action="{{url("signup/register")}}" class="form-horizontal" method="POST">
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Enter name" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Email:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" placeholder="Enter email" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Enter password" required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign up</button>
        </div>
    </div>
</form>