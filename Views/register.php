
<h1 style="text-align: center">Welcome</h1>

<form action="reg" method="post" style="width:50%;margin: auto" >
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="name" class="form-control" id="name" aria-describedby="emailHelp" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <input type="submit" class="btn btn-primary"  value="Register" >

</form>
