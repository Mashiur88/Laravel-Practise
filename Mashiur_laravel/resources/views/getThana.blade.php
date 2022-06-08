@if(!empty($thana)) 

         echo "<option value='0'>Select Thana</option>";
    @foreach($thana as $row)
        
            echo "<option value=".$row['id'].">". $row['name'] ."</option>";
    @endforeach           

@else

    echo "<option value='0'>No Thana Found</option>";

@endif    

