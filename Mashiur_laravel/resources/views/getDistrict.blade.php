@if (!empty($districts)) 

         echo "<option value='0'>Select District</option>";
         
    @foreach($districts as $row)         
            echo "<option value=".$row['id'].">". $row['name'] ."</option>";
    @endforeach        

@else

    echo "<option value='0'>No District Found</option>";

@endif
