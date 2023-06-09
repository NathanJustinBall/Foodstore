<html>

<head>
<title>New item</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/new_item_s.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

<?php
include 'links.php';
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#check_item').click(function(){
            var barcode = document.getElementById("barcode").value;
            var item = document.getElementById("item").value;
            var vendor = document.getElementById("vendor").value;
            console.log(barcode, item, vendor);
            $.ajax({
                type: "GET",
                url: "src/controller/query.php",
                data: {"barcode": barcode, "vendor": vendor},
                dataType: "json",
                success: function(response){
                    console.log(response);
                    if (response !== "null") {
                        if (response === "invalid") {  // invalid comes from scraper
                            alert(barcode+" doesn't match anything!")
                        }
                        else if (response === "no_vend") {
                            alert("No vendor set!")
                        }
                        else if (response === "no_scraper") {
                            alert("Scraper not currently implemented!")
                        }
                        else {  // if everything else has passed
                            var data = response;  // removed now unnecessary usage of parseJson as json is now returned automatically 
                            $('#item').val(data.name);
                            $('#weight').val(data.weight);
                            console.log(data.weight);
                            $('#price').val(data.price);
                            $('#item_id').val(data.id);
                            $("#image").attr('src', data.image_adr);
                        }
                    }
                    
                    else {
                        alert("No items matched your input")
                    }
                }
                });
        });
    });

</script>

<div class="main_body">
    <div class="central">
        <form action="new_item.php" method="get">
            <select id="vendor" name="vendor">
                <option value="asda">Asda</option>
                <option value="iceland">Iceland</option>
                <option value="morrisons">Morissons</option>
                <option value="waitrose">Waitrose</option>
                <option value="tesco">Tesco</option>
            </select>
            <input type="button" name="check" value="Scrape item" id="check_item">
            <input type="text" name="barcode" value="Barcode" id="barcode">
            <br>
            <br>
            <p2>Item name:</p2>
            <input type="text" name="item" value="Item" id="item">
            <div id="img_container">
                <img id="image">
            </div>            

            <br>
            <p2>Item ID:</p2>
            <input type="text" name="item_id" Value="" id="item_id">
            <br>
            <p2>Bought on:</p2>
            <input type="date" name="date" id="date_bought">
            <br>
            <p2>Expires on:</p2>
            <input type="date" name="date" id="date_expiry">
            <br>
            <p2>Shelf life (days once opend):</p2>
            <input type="text" name="shelf_life" Value="1" id="shelf_life">
            <br>
            <p2>Price: &pound;</p2>
            <input type="number" name="price" Value="0.00" id="price" step="any">
            <br>
            <p2>Quantity:</p2>
            <input type="number" name="count" Value="1" id="count">
            <br>
            <p2>Weight (g):</p2>
            <input type="text" name="weight" Value="1" id="weight">
            <br>
            <p2>Open?</p2>
            <!--<label class="switch"> -->
            <input type="checkbox" name="opend" id="opend" value="yes">
            <!--    <span class="slider round"></span>
            </label>  -->
            <br>
            <input type="submit" value="Add Item">

        </form>
    </div>
</div>
</body>
</html>