<style>
    table,tr
    {
        border: 2px solid red;
        border-collapse: collapse;
        width: 100%
            text-align: center;
    }
    td,th
    {
        border: 2px solid red;
        padding: 10px;
    }
</style>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <table id="showData">
            <tr>
                <th>DivisionName</th>
                <th>DistrictName</th>
                <th>Thana</th>
                <th>Id</th>
                <th>FullName</th>
            </tr>
            @php
            $divrowSpan = $disrowSpan = $throwSpan = array();
            $a = $b = $c = "";
            $x = $y = $z = 0;
            @endphp
            @foreach ($Aarray as $i => $value)
                @if ($i == 0) 
                    @php
                    $a = $value['divName'];
                    $Aarray[$i]['Dprint'] = 'y';
                    $divrowSpan[$x] = !empty($divrowSpan[$x]) ? $divrowSpan[$x] : 0;
                    $divrowSpan[$x] += 1;
                    @endphp
                @elseif ($value['divName'] === $a)
                    @php
                    $divrowSpan[$x] = !empty($divrowSpan[$x]) ? $divrowSpan[$x] : 0;
                    $divrowSpan[$x] ++;
                    $Aarray[$i]['Dprint'] = 'n';
                    @endphp
                @else
                    @php
                    $Aarray[$i]['Dprint'] = 'y';
                    $x++;
                    $divrowSpan[$x] = !empty($divrowSpan[$x]) ? $divrowSpan[$x] : 0;
                    $divrowSpan[$x] ++;
                    $a = $value['divName'];
                    @endphp
                @endif
            @endforeach
            
            {{-- @foreach ($divrowSpan as $v){{ $v }} @endforeach --}}


            @foreach ($Aarray as $i => $value)
                @if ($i == 0)
                    @php
                    $b = $value['disName'];
                    $Aarray[$i]['Sprint'] = 'y';
                    $disrowSpan[$y] = !empty($disrowSpan[$y]) ? $disrowSpan[$y] : 0;
                    $disrowSpan[$y] ++;
                    @endphp
                @elseif ($value['disName'] === $b)
                    @php
                    $disrowSpan[$y] = !empty($disrowSpan[$y]) ? $disrowSpan[$y] : 0;
                    $disrowSpan[$y] ++;
                    $Aarray[$i]['Sprint'] = 'n';
                    @endphp
                @else
                    @php
                    $Aarray[$i]['Sprint'] = 'y';
                    $y++;
                    $disrowSpan[$y] = !empty($disrowSpan[$y]) ? $disrowSpan[$y] : 0;
                    $disrowSpan[$y] ++;
                    $b = $value['disName'];
                    @endphp
                @endif
            @endforeach
            
            
            @foreach ($Aarray as $i => $value) 
                @if ($i == 0)
                    @php
                    $c = $value['tName'];
                    $Aarray[$i]['Tprint'] = 'y';
                    $throwSpan[$z] = !empty($throwSpan[$z]) ? $throwSpan[$z] : 0;
                    $throwSpan[$z] ++;
                    @endphp
                @elseif ($value['tName'] === $c)
                    @php
                    $throwSpan[$z] = !empty($throwSpan[$z]) ? $throwSpan[$z] : 0;
                    $throwSpan[$z] ++;
                    $Aarray[$i]['Tprint'] = 'n';
                    @endphp
                @else
                    @php
                    $Aarray[$i]['Tprint'] = 'y';
                    $z++;
                    $throwSpan[$z] = !empty($throwSpan[$z]) ? $throwSpan[$z] : 0;
                    $throwSpan[$z] ++;
                    $c = $value['tName'];
                    @endphp
                @endif
            @endforeach
            

            @php $index = $index1 = $index2 = 0; @endphp
            
            @foreach ($Aarray as $i => $value)
                @php $value['fullname'] = $value['first_name']." ".$value['last_name']; @endphp
                <tr>                    
                    @if ($value['Dprint'] === 'y')                        
                        <td rowspan="@php echo $divrowSpan[$index] @endphp">{{ $value['divName'] }}</td>                        
                        @if ($value['Sprint'] === 'y')                            
                            <td rowspan="@php echo $disrowSpan[$index1] @endphp">@php echo $value['disName']; @endphp</td>                            
                            @if ($value['Tprint'] === 'y')                                
                                <td rowspan="@php echo $throwSpan[$index2] @endphp">@php echo $value['tName']; @endphp</td>
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td>
                                @php
                                    $index2++;
                                @endphp
                            @else                                
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td> 
                            @endif
                            @php
                                $index1++;
                            @endphp
                        @else
                            @if ($value['Tprint'] === 'y')
                                <td rowspan="@php echo $throwSpan[$index2] @endphp">@php echo $value['tName']; @endphp</td>
                                <td>{{ $value['id'] }}</td>
                                <td>{{ $value['fullname'] }}</td>
                                @php
                                    $index2++;
                                @endphp
                            @else
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td>                                
                            @endif                            
                        @endif 
                        @php
                            $index++;
                        @endphp
                    @else                       
                        @if ($value['Sprint'] === 'y')                            
                            <td rowspan="@php echo $disrowSpan[$index1] @endphp">@php echo $value['disName']; @endphp</td>                            
                            @if ($value['Tprint'] === 'y')                            
                                <td rowspan="@php echo $throwSpan[$index2] @endphp">@php echo $value['tName']; @endphp</td>
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td>
                                @php
                                    $index2++;
                                @endphp
                            @else                                
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td>                              
                            @endif
                          
                            @php
                                $index1++;
                            @endphp
                        @else
                            @if ($value['Tprint'] === 'y')                                
                                <td rowspan='@php echo $throwSpan[$index2]; @endphp'>@php echo $value['tName']; @endphp</td>
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td>
                                @php
                                $index2++;
                                @endphp
                            @else                               
                                <td>@php echo $value['id']; @endphp</td>
                                <td>@php echo $value['fullname']; @endphp</td>                               
                            @endif
                            
                       @endif 
                    @endif    

                </tr>
            @endforeach
            
    </body>
</html>