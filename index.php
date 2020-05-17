<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="fetch()">

    <section class="container-fluid">
        <div class="text-center">
            <h1>COVID-19</h1>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for your country..">
        </div>

        <table class="mt-3 table table-bordered text-center" id="tbval">
            <tr>
                <th>Country</th>
                <th>Total Confirmed</th>
                <th>New Confirmed</th>
                <th>Total Deaths</th>
                <th>New Deaths</th>
                <th>Total Recovered</th>
                <th>New Recovered</th>
            </tr>
        </table>
    </section>

    <script>
        function fetch(){
            $.get("https://api.covid19api.com/summary" , 
                // anonmyous function
                function(data){
                    // console.log(data['Countries'].length);

                    var tbval = document.getElementById("tbval");
                    // using for loop to generate table data
                    for(var i=1; i<(data['Countries'].length); i++ ){
                        // inserting a new row
                        var x = tbval.insertRow();

                        // inserting the cell into the row

                        x.insertCell(0);
                        tbval.rows[i].cells[0].innerHTML = data["Countries"][i-1]["Country"];
                        
                        x.insertCell(1);
                        tbval.rows[i].cells[1].innerHTML = data["Countries"][i-1]["TotalConfirmed"];
                        // new confirmed
                        x.insertCell(2);
                        tbval.rows[i].cells[2].innerHTML = data["Countries"][i-1]["NewConfirmed"];
                        // total deaths
                        x.insertCell(3);
                        tbval.rows[i].cells[3].innerHTML = data["Countries"][i-1]["TotalDeaths"];
                        // new deaths
                        x.insertCell(4);
                        tbval.rows[i].cells[4].innerHTML = data["Countries"][i-1]["NewDeaths"];
                        // total recovered 
                        x.insertCell(5);
                        tbval.rows[i].cells[5].innerHTML = data["Countries"][i-1]["TotalRecovered"];
                        // new recovered
                        x.insertCell(6);
                        tbval.rows[i].cells[6].innerHTML = data["Countries"][i-1]["NewRecovered"];
                       

                     


                  

                     

                    }
                }
            );
        }

        // searching data from a textbox
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tbval");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <footer class="container-fluid footer">
        <div class="text-center">
            <p>
                Email me at <p class="email"><strong>alijawwad001@gmail.com</strong></p>
            </p>
        </div>
    </footer>
</body>
</html>

