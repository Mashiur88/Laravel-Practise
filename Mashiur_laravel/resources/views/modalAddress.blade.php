@if (!empty($address))
        @php   echo $address["address"] . "," . $address["thana"] . "," . $address["district"] . "," . $address["division"]; @endphp     
@else
        @php echo "Nothing Found"; @endphp
@endif