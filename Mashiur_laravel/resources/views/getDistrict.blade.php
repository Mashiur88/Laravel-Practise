@if (!empty($districts)) 

         @php echo "<option value='0'>Select District</option>"; @endphp
         
    @foreach($districts as $row)         
           @php  echo "<option value=".$row['id'].">". $row['name'] ."</option>"; @endphp
    @endforeach        

@else

    echo "<option value='0'>No District Found</option>";

@endif
