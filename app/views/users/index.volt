<?php
if ($this->session->has("auth")) {
$auth = $this->session->get("auth");
$username = $auth['username'];
echo "Hallo selamat datang $username";
?>
<br/>
<a href="{{url('login/logout')}}">Logout</a>
<?php
}
?>
<h2>User</h2>
<div class="row">
<center>
<form action="{{url("users/search")}}" class="search" method="POST">
    <input type="text" name="email" class="form-control input-sm" placeholder="cari nama">
    <button type="submit" class="btn btn-primary btn-sm">Search</button>
</form>
</center>
</div>
<br/>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Del</th>
        </tr>
    </thead>
    <tbody>
        {% for v in data_user %}
        <tr>
        <td>{{v.name}}</td>
        <td>{{v.email}}</td>
        <td><a href="users/edit/{{v.id}}">edit</a></td>
        <td><a href="users/del/{{v.id}}">del</a></td>
        </tr>
        {% endfor %}
    </tbody>
</table>