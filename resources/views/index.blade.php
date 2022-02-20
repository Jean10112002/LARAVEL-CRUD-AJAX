<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-sm-2" type="text" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>
    
      <div class="container">
          <h1 class="text-center mt-4">Crud ajax</h1>
          <button class="btn btn-primary" onClick="create()">Agregar</button>
          <div id="read" class="mt-3"></div>

      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        /* $(document).ready(function(){
          console.log("areasdas");
          read();
        });
        function read(){
          $.get("{{url('read')}}",{},function(data,status){
            $(#read).html(data);
          })
        }
        function create(){
          $.get(" {{url('create')}} ", {},function(){
            $("#exampleModalLabel").html('Create Product');
            $("#page").html(data);
            $("#exampleModal").modal('show');
          })
        }
        function store(){
          let name=$("#name").val();
          $.ajax({
            type:'get',
            url:" {{url('store')}} ",
            data:"name="+name,
            success:function(data){
              $(".btn-close").click();
              read();
            }
          })
        }

        function show(id){
          $.get(" {{url('show')}} /"+id, {},function(data,status){
            $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
          })
        }


        function update(id){
          let name=$("#name").val();
          $.ajax({
            type:"get",
            url:" {{url('update')}} /"+id,
            data:"name="+name;
            success:function(data){
              $(".btn-close").click();
              read();
            }
          })
        }
        function destroy(id){
          $.ajax({
            type:"get",
            url:" {{url('destroy')}}/ "+id,
            data:"name="+name,
            success: function(data){
              $(".btn-close").click();
              read();
            }
          })

        } */



        $(document).ready(function() {
            read()
        });
        // Read Database
        function read() {
          $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }
        // Untuk modal halaman create
        function create() {
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // untuk proses create data
        function store() {
            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                }
            });
        }
        // Untuk modal halaman edit show
        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }
        // untuk proses update data
        function update(id) {
            var name = $("#name").val();
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/"+id,
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                },
                error:function(error){
                  console.log(error);
                }
            });
        }
        // untuk delete atau destroy data
        function destroy(id) {
            $.ajax({
                type: "get",
                url: "{{ url('destroy') }}/" + id,
                data: "name=" + name,
                success: function(data) {
                    $(".btn-close").click();
                    read()
                },
                error: function(error){
                  console.log(error);
                }
            });
        }

    </script>
</body>
</html>