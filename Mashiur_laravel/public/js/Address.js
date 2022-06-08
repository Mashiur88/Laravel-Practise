function showDistrict(id)
{
    // window.alert(id);
//    console.log("Hello World");
    if (id === 0)    
    {                                         
        document.getElementById("district").innerHTML = "<option value=''>No District Found</option>";
        document.getElementById("thana").innerHTML = "<option value=''>No Thana Found</option>";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("district").innerHTML = this.responseText;
            document.getElementById("thana").innerHTML = "<option value=''>Select Thana</option>";
        }
    }
    xhttp.open("GET", "{{route('address.district','')}}" + "/" + id, true);
    xhttp.send();
}

function showThana(id)
{  //name = document.getElementById("division").value;
    //window.alert(id);
    if (id === 0)   
    {
        document.getElementById("thana").innerHTML = "<option value=''>No Thana Found</option>";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("thana").innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "{{ url('address.thana')}}" + '/' + id);
    xhttp.send();
}                    
