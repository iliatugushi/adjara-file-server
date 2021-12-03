<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Interface</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="antialiased">
    <div class="jumbotron text-center">
        <h1>ბაზაში მონაცემების ჩამატების ინტერფეისი</h1>
        <p>ამ ინტერფეისით შეძლებთ ბაზაში მონაცემების ჩამატებას სანამ ახალი SOFT დააყენებთ </p>
        <div class="d-flex">
            <ul class="nav nav-pills text-center list-inline mx-auto justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#sakmes">საქმეები</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#files">ფაილები</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="container">



        <!-- Tab panes -->
        <div class="tab-content pb-5">
            <div class="tab-pane container active" id="sakmes">
                <div class="col-12">
                    <form method="post" action="{{ route('sakmeNew') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 pt-3">
                            <div class="form-group">
                                <label>იდენტიფიკატორი</label>
                                <input type="text" class="form-control" name="identifikator" required>
                            </div>
                            <div class="form-group">
                                <label>გზა ფოლდერი</label>
                                <input type="text" class="form-control" name="path" required>
                            </div>
                            <button type="submit" class="btn btn-primary caps btn-sm">დამატება</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 pt-4">
                    <table class="table tableData  table-striped table-bordered" style="font-size:13px;">
                        <thead class="caps">
                            <tr>
                                <th scope="col">იდენტიფიკატორი</th>
                                <th scope="col">ფოლდერი</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sakmes as $item)
                            <tr>
                                <th>{{$item->identifikator}}</th>
                                <th>{{$item->path}}</th>
                                <th>
                                    <a href="{{route('delete', ['element' => 'sakme', 'elementID' => $item->id])}}">
                                        წაშლა
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="tab-pane container fade" id="files">
                <div class="col-12 ">
                    <form method="post" action="{{ route('fileNew') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 pt-3">
                            <div class="form-group">
                                <label>საქმის იდენტიფიკატორი</label>
                                <input type="text" class="form-control" name="sakme_id" required>
                            </div>
                            <div class="form-group">
                                <label>ფაილის იდენტიფიკატორი</label>
                                <input type="text" class="form-control" name="identifikator" required>
                            </div>
                            <div class="form-group">
                                <label>ფოლდერი</label>
                                <input type="text" class="form-control" name="path" required>
                            </div>
                            <div class="form-group">
                                <label>დასახელება</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>ფაილის ტიპი</label>
                                <input type="text" class="form-control" name="mime_type" required>
                            </div>

                            <button type="submit" class="btn btn-primary caps btn-sm">დამატება</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 pt-4">
                    <table class="table tableData  table-striped table-bordered" style="font-size:12px;">
                        <thead class="caps">
                            <tr>
                                <th scope="col">საქმე</th>
                                <th scope="col">იდენტიფიკატორი</th>
                                <th scope="col">ფოლდერი</th>
                                <th scope="col">დასახელება</th>
                                <th scope="col">ფაილის ტიპი</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $item)
                            <tr>
                                <th>{{$item->sakme_id}}</th>
                                <th>{{$item->identifikator}}</th>
                                <th>{{$item->path}}</th>
                                <th>{{$item->name}}</th>
                                <th>{{$item->mime_type}}</th>
                                <th>
                                    <a href="{{route('delete', ['element' => 'file', 'elementID' => $item->id])}}">
                                        წაშლა
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>





</body>

</html>
