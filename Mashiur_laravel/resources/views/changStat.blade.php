@php
$st1 = ($stat == '1') ? 'Active' : 'Inactive';
$st2 = ($stat == '1') ? 'Inactive' : 'Active';
@endphp
    @if ($btn == 1) 
        <td><button class="btn btn-primary" onclick="changeStatus( {{ $id }},{{ $stat }})">{{ $st2 }}</button></td>
    @else
        @php echo $st1; @endphp
    @endif


