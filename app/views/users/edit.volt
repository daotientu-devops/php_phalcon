<form action="{{url("users/update")}}" class="form-horizontal" method="POST">
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{name}}" required/>
            <input type="hidden" class="form-control" name="id" value="{{id}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="username">Email:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{email}}" required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Simpan</button>
        </div>
    </div>
</form>