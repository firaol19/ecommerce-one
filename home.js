var product_id = document.getElementsByClassName("cart__btn");
for (var i = 0; i<product_id.length; i++){
    product_id[i].addEventListener("click", function(event){
        var target = event.target;
        var id = target.getAttribute("data-id");

        var xml = new XMLHttpRequest()
        xml.onload = function() {
            var data = JSON.parse(this.responseText);
            target.innerHTML = data.in_cart;
            document.getElementById("count").innerHTML = data.num_cart + 1;
        }

        xml.open("GET","connection.php?id="+id,true);
        xml.send();

        
    });
}
