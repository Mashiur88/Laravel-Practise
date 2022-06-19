@php
$st1 = ($status == '1') ? 'Active' : 'Inactive';
$st2 = ($status == '1') ? 'Inactive' : 'Active';
@endphp
@if($btn == 1) 
    <button class="btn btn-primary" onclick="changeStatus({{ $id }},{{ $status }})">{{ $st2 }}</button>
@else
    @php echo $st1; @endphp
@endif


