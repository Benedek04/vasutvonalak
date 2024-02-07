window.onload = updateOptions;

function teszt() {
    var tavolsag = document.getElementById('distance').value;
    var atlagSebesseg = document.getElementById('atlagSeb').value;

    var eredmeny = tavolsag / atlagSebesseg

    document.getElementById('output').innerText = tavolsag + " km";

    document.getElementById('menetIdo').innerText = eredmeny + " óra";

    var form = document.getElementById("calculationAndPrint");
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "db.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Display the result on the same page
                document.getElementById("database").innerHTML = xhr.responseText;
            } else {
                console.error("Error:", xhr.status);
            }
        }
    };
    xhr.send(formData);

    // Prevent default form submission behavior
    return false;
}