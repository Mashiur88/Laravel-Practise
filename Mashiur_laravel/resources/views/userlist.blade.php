@extends('layouts.app1')

@section('content')
<div class="container" style="margin: auto;">
    <div class="row justify-content-center">

        <form method="POST" action="{{ route('user.search') }}">
            {{ csrf_field() }}
            <div class="row mb-3">
                <div class="col-sm-3"></div>
                <div class="col-sm-4">
                    <input class="form-control" type="text" name="search" id="search" placeholder="type here">
                </div>
                <div class="col-sm-2">
                    <input class="form-control" type="submit" name="find" id="find" value="Search">
                </div>      
            </div>
        </form>
        <h3>User List</h3>
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>UserName</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th colspan="3"><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)

                @foreach ($users as $row)
                @if ($row["gender"] == 1)
                @php $temp = "male"; @endphp
                @elseif ($row["gender"] == 2)
                @php $temp = "female"; @endphp
                @endif
                @if($row["status"] == 0) 
                @php $temp1 = "Inactive"; @endphp
                @elseif ($row["status"] == 1)              
                @php $temp1 = "Active"; @endphp
                @endif
                @php $id = $row['id'];
                $stat = $row['status'];  @endphp                  
                <tr>
                    <td>{{ $row["first_name"] }}</td>
                    <td><?php echo $row["last_name"] ?></td>
                    <td><?php echo $row["user_name"] ?></td>
                    <td>{{ $temp }}</td>
                    <td>
                        <button type="button" id="modal-body" class="btn btn-primary" onclick="getAddress(<?php echo $id; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View Address
                        </button>
                    </td>
                    <td id='cxngstatus{{ $id }}'><?php echo $temp1 ?></td>
                    <td id='cxngstatusBtn{{ $id }}'><button class="btn btn-primary" onclick="changeStatus({{ $id }}, {{ $stat }})">{{ ($stat == '1') ? 'Inactive' : 'Active' }}</button></td>
                    <td><a href = "{{ route('user.edit',$row['id']) }}"><i class="fa-solid fa-pen"></i></a></td> 
                    <td><a href = "{{ route('user.delete',$row['id']) }}" ><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                @endforeach 
                @else            
            <td colspan = '6'> No Data Found </td>         
            @endif
            </tbody>
        </table>

        @php echo $users->render(); @endphp


        <!--        <div>
                    <form method='POST'>
                        <div class="row mb-3">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-4">
                                <select class="form-select" id='limit' name='limit'>
                                    isset($limit)&& 
                                    <option value=""<?php echo (isset($limit) && $limit == 2) ? 'selected' : ''; ?>>Default</option>
                                    <option value="3"<?php echo (isset($limit) && $limit == 3) ? 'selected' : ''; ?>>3</option>
                                    <option value="4" <?php echo (isset($limit) && $limit == 4) ? 'selected' : ''; ?>>4</option>
                                    <option value="5" <?php echo (isset($limit) && $limit == 5) ? 'selected' : ''; ?>>5</option>
                                    <option value="6" <?php echo (isset($limit) && $limit == 6) ? 'selected' : ''; ?>>6</option>
                                    <option value="10" <?php echo (isset($limit) && $limit == 10) ? 'selected' : ''; ?>>10</option>
                                    <option value="11" <?php echo (isset($limit) && $limit == 11) ? 'selected' : ''; ?>>11</option>
                                    <option value="12" <?php echo (isset($limit) && $limit == 12) ? 'selected' : ''; ?>>12</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input class="form-control" type="submit" name="send" id="send" value="setlimit">
                            </div>
                        </div>
                    </form>     
                </div>-->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Full Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="addressModal">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function getAddress(id)
    {
    console.log(id);
    var url = "{{ URL::to('/address/modal/') }}";
    $.ajax({
    type:'POST',
            url:url,
            data:{
            'id': id
            },
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res)
            {
            console.log(res);
            $("#addressModal").html(res.text);
            }
    });
    }
    function changeStatus(id, status)
    {
    //window.alert(status);
    btn = 0;
    var url = "{{ url('/changstat') }}";
    $.ajax({
    type:'POST',
            url: url,
            data:{
            'id': id,
                    'status': status,
                    'btn': btn
            },
            headers:
    {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            success:function(res)
            {
            console.log(res);
            $("#cxngstatus" + id).html(res.text);
            }
    });
    btn2 = 1;
    var url2 = "{{ url('/changstat') }}";
    $.ajax({
    type:'POST',
            url: url2,
            data:{
            'id': id,
                    'status': status,
                    'btn': btn2
            },
            headers:
            {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res) {
            console.log(res);
            $("#cxngstatusBtn" + id).html(res.text);
            }
    });
    }


    //window.alert(url);
    //console.log(id);
    //        var url = "{{ url('/address/modal/') }}/" + id;
    //        if (id === 0)
    //        {
    //        document.getElementById("modal-body").innerHTML = "Nothing Found";
    //        return;
    //        }
    //        const xhttp = new XMLHttpRequest();
    //        xhttp.onreadystatechange = function ()
    //        {
    //        if (this.readyState == 4 && this.status == 200)
    //        {
    //        document.getElementById("modal-body").innerHTML = this.responseText;
    //        }
    //        }
    //        xhttp.open("GET", url, true);
    //        xhttp.send();


//        btn = 0;
//        btn2 = 1;
//        var url = "{{ url('/changstat') }}/" + id + "/" + status + "/" + btn;
//        var url2 = "{{ url('/changstat') }}/" + id + "/" + status + "/" + btn2;
//        if (id === 0)
//        {
//        return;
//        }
//        const xhttp = new XMLHttpRequest();
//        xhttp.onload = function()
//        {
//        if (this.readyState == 4 && this.status == 200)
//        {
//        document.getElementById("cxngstatus" + id).innerHTML = this.responseText;
//        }
//        }
//        xhttp.open("GET", url, true);
//        xhttp.send();
//        const xhttp1 = new XMLHttpRequest();
//        xhttp1.onreadystatechange = function()
//        {
//        if (this.readyState == 4 && this.status == 200)
//        {
//        document.getElementById("cxngstatusBtn" + id).innerHTML = this.responseText;
//        }
//        }
//        xhttp1.open("GET", url2, true);
//        xhttp1.send();

</script>
@endsection
