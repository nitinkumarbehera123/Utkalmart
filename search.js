function searchFunction() {

    var input, filter, products, pname, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();

    products = $(".box");

    for (i = 0; i < products.length; i++) {
        pname = products[i].getAttribute('data-content');

        if (pname) {
            if (pname.toUpperCase().indexOf(filter) > -1) {
                products[i].style.display = "";
            } else {
                products[i].style.display = "none";
            }
        }
    }

}