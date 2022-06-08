@extends('layouts.app')

@section('content')

<div class="container-fluid p-0 m-0">

    <div class="container-fluid text-center bg-info">
        
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
                    <th>Change status</th>
                    <td colspan="2"><b>Action</b></td>
                </tr>
            </thead>
            
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
                        <td><?php echo $temp ?></td>
                        <td>
                        <button type="button" class="btn btn-primary" onclick="getAddress(<?php echo $id; ?>)" data-bs-toggle="modal" data-bs-target="#myModal">
                            View Address
                        </button>
                        </td>
                        <td id='cxngstatus<?php echo $id; ?>'><?php echo $temp1 ?></td>
                        <td id='cxngstatusBtn<?php echo $id; ?>'><button class="btn btn-primary" onclick="changeStatus(<?php echo "$id,$stat"; ?>)"><?php echo($row['status'] == '1') ? 'Inactive' : 'Active'; ?></button></td>
                        <td><a href = 'updateUser.php?id=<?php echo $row["id"] ?>'><i class="fa-solid fa-pen"></i></a></td>
                        <td><a href = '../controller/actionDelete.php?id=<?php echo $row["id"] ?>'><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <!-- Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog modal-fullscreen-sm-down">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Full Address</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body" id="modal-body">
                                        
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>                    
                @endforeach 
            @else            
                @php echo "<td colspan = '6'> No Data Found </td>"; @endphp           
            @endif
        </table>
 <!--       <div>
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
            </form>   -->
{{--
<!--             @php
            //($pageno%3==0) ? $x :
            $y2 = ceil($result['pageno'] / 3) * 3;
            $x = (empty($result['pageno']) || ($result['pageno'] > 0 && $result['pageno'] <= 3)) ? 1 : (($result['pageno'] > 3 && $result['pageno'] % 3 == 0) ? ($result['pageno'] - 2) : (floor($result['pageno'] / 3) * 3) + 1);
            $y = (empty($result['pageno']) || ($result['pageno'] > 0 && $result['pageno'] <= 3)) ? ($result['pageCount'] < 3 ? $result['pageCount'] : 3) : ($result['pageCount'] < $y2 ? $result['pageCount'] : $y2);
            echo '<ul class="pagination">';
            echo $x > 1 ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=1&limit=' . $result['limit'] . '"><<</a></li>' : '';
            echo $x > 1 ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . ($x - 1) . '&limit=' . $result['limit'] . '">Prev</a></li>' : '';
            for ($i = $x; $i <= $y; $i++) {
                echo '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . $i . '&limit=' . $result['limit'] . '">' . $i . '</a></li>';
            }
            echo $y < $result['pageCount'] ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . ($y + 1) . '&limit= ' . $result['limit'] . '">Next</a></li>' : '';
            echo $y < $result['pageCount'] ? '<li class="page-item"><a class="page-link" href="userlist.php?pageno=' . ($result['pageCount']) . '&limit= ' . $result['limit'] . '">>></a></li>' : '';
            echo '</ul>';
            @endphp  
        </div>   -->  --}}
    </div>
</div>
@endsection