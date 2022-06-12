@if(!empty($thana)) 

         @php echo "<option value='0'>Select Thana</option>"; @endphp
    @foreach($thana as $row)
        
          <option value=" {{ $row['id'] }}">{{ $row['name'] }}</option>
    @endforeach           

@else
    @php echo "<option value='0'>No Thana Found</option>"; @endphp
@endif    

