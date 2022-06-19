@if (!empty($districts)) 

         @php echo "<option value='0'>Select District</option>"; @endphp
         
    @foreach($districts as $row)         
           <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
    @endforeach        
@else

    <option value='0'>No District Found</option>

@endif
