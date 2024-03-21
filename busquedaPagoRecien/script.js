document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var clientName = document.getElementById("clientName").value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "search_payments.php?clientName=" + clientName, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("paymentResult").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});
